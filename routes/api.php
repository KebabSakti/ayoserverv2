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


//CUSTOMER API
Route::prefix('customer')->group(function () {
    Route::get('/phone/{phone}', [App\Http\Controllers\Customer\UtilityController::class, 'phone']);

    Route::prefix('auth')->group(function () {
        Route::post('/register', [App\Http\Controllers\Customer\AuthController::class, 'register']);
        Route::post('/user', [App\Http\Controllers\Customer\AuthController::class, 'user']);
        Route::middleware('auth:sanctum')->post('/revoke', [App\Http\Controllers\Customer\AuthController::class, 'revoke']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        //
    });
});
