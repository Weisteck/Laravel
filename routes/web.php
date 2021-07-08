<?php

use App\Http\Controllers\OrganisationController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MissionController;
use \App\Models\MissionLine;
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


Route::resource('organisations', OrganisationController::class);
Route::resource('/organisations/{organisation}/missions', MissionController::class, ['only'=>['create', 'store']]);
Route::resource('/missions', MissionController::class, ['except'=>['create', 'store']]);
Route::resource('/organisations/{organisation}/missions/{missions}/lines', MissionLine::class);
