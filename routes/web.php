<?php

use App\Events\MessageEvent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    broadcast(new MessageEvent(['message' => 'Hello websocket']));

    return view('welcome');
});

Route::get('chat/{message}', [\App\Http\Controllers\ChatController::class, 'chat']);
