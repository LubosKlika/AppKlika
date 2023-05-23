<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


 
    Route::get('/enter-code', [UserCodeController::class, 'show']);
    Route::post('/enter-code', [UserCodeController::class, 'enter']);

Route::middleware(['user.code'])->group(function () {
 

    Route::get('/', [MainController::class, 'showBoard']);
    Route::get('/createMatch', [MainController::class, 'createMatch']);
    Route::get('/createPlayer', [MainController::class, 'createPlayer']);
    Route::get('/profile/{player}', [MainController::class, 'showProfile'])->name('profile');
    Route::post('/language', [LanguageController::class, 'changeLanguage']);




});