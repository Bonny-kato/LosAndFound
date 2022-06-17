<?php

use App\Http\Controllers\DashboardController;
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

Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login')->name('login-into-account');
    Route::post('/register', 'register')->name('register-account');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::middleware('auth')->group(function (){
        Route::post('/upload', 'uploadLostItem')->name('upload-lost-item');
    });
});
