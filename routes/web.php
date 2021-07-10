<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginCallbackController;
use App\Http\Controllers\LoginRedirectController;
use App\Http\Controllers\LogoutController;
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
Route::resource('/', HomeController::class, ['only' => ['index']]) ;

Route::get('/login/redirect', LoginRedirectController::class);
Route::get('/login/callback', LoginCallbackController::class);
Route::get('/logout', LogoutController::class);

Route::resource('organisations', OrganisationController::class)
    ->middleware('auth');
Route::resource('/organisations/{organisation}/missions',
    MissionController::class, ['only'=>['create', 'store']])
    ->middleware('auth');
Route::resource('/missions', MissionController::class, ['except'=>['create', 'store']])
    ->middleware('auth');
Route::resource('/organisations/{organisation}/missions/{missions}/lines', MissionLine::class)
    ->middleware('auth');
