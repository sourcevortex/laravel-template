<?php

use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('v1')->group(function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@authenticate');
});

/*
|--------------------------------------------------------------------------
| Private Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('v1')->group(function() {
    Route::middleware('jwt.verify')->group(function() {
        Route::resource('users', 'UserController');
    });
});

