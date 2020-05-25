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

Route::prefix('v1')->group(function() {
    Route::middleware(['error.handler'])->group(function() {
        /*
        |--------------------------------------------------------------------------
        | Public Routes
        |--------------------------------------------------------------------------
        |
        */
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@authenticate');

        /*
        |--------------------------------------------------------------------------
        | Private Routes
        |--------------------------------------------------------------------------
        |
        */
        Route::middleware('jwt.verify')->group(function() {
            Route::apiResource('users', 'UserController');
        });
    });
});

