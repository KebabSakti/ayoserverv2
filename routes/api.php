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
    //AUTH
    Route::prefix('auth')->group(function() {
        Route::post('/authenticate', [App\Http\Controllers\Customer\AuthController::class, 'authenticate']);
        Route::post('/update', [App\Http\Controllers\Customer\AuthController::class, 'update']);
        Route::post('/revoke', [App\Http\Controllers\Customer\AuthController::class, 'revoke']);
        Route::post('/exist', [App\Http\Controllers\Customer\AuthController::class, 'exist']);
    });
    
    //MOBILE PAGE
    Route::prefix('page')->group(function() {
        Route::get('home', [App\Http\Controllers\Customer\MobilePageController::class, 'home']);
        Route::get('search', [App\Http\Controllers\Customer\MobilePageController::class, 'search']);
    });

    Route::prefix('domain')->group(function() {
        Route::post('product', [App\Http\Controllers\Customer\ProductController::class, 'product']);
        Route::post('product/total', [App\Http\Controllers\Customer\ProductController::class, 'productTotal']);
        Route::post('search', [App\Http\Controllers\Customer\SearchController::class, 'search']);
    });
});
