<?php

use App\Http\Controllers\OrganisationController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MissionController;
use \App\Models\MissionLine;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/login/callback', function () {
    $user = Socialite::driver('github')->user();

    $databaseUser = User::query()->firstOrNew(['email' => $user->getEmail()]);

    $databaseUser
        ->fill([
            'name' => $user->getName() ?? $user->getNickname(),
            'email' => $user->getEmail()
        ])
        ->save();

    Auth::login($databaseUser);

    return redirect('/');
});

Route::get('/logout', function (){
    Auth::logout();

    return redirect('/');
});

Route::resource('organisations', OrganisationController::class)
    ->middleware('auth');
Route::resource('/organisations/{organisation}/missions',
    MissionController::class, ['only'=>['create', 'store']])
    ->middleware('auth');
Route::resource('/missions', MissionController::class, ['except'=>['create', 'store']])
    ->middleware('auth');
Route::resource('/organisations/{organisation}/missions/{missions}/lines', MissionLine::class)
    ->middleware('auth');
