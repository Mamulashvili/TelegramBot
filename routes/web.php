<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;

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

Route::get('/', HomeController::class)->name('home');


// Route::post('/botman', [BotManController::class, 'handleBotManConversation']); 
// Route::post('/botman/send', [BotManController::class, 'sayHi'])->name('sayHi'); 

Route::group(['prefix' => 'botman'], function ($router) {
    Route::post('/', [BotManController::class, 'handleBotManConversation']); 
    Route::post('/send', [BotManController::class, 'sayHi'])->name('sayHi'); 
 });
 