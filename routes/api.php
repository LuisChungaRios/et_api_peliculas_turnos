<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HourController as AdminHourController;
use App\Http\Controllers\Admin\FilmController as AdminFilmController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Auth')->prefix('auth')->group( function () {

    Route::post('login',[LoginController::class, 'login']);
    Route::post('signup',[LoginController::class, 'signup']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');
});

Route::middleware(['auth:api','Admin'])->prefix('admin')->group( function () {

    Route::resource('hours', AdminHourController::class);
    Route::resource('films', AdminFilmController::class);

});

