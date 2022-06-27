<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect("/login");
});

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
        Route::get('/my-items', 'myItems')->name('my-items');
        Route::get('/details/{lostItem}', 'details')->name('details');
        Route::get('/claim/{lostItem}', 'claim')->name('claim');
    });
});

Route::controller(AdminDashboardController::class)->group(function (){
    Route::get('/admin-dashboard', 'index')->name('admin-dashboard');

    Route::middleware('auth')->group(function (){
        Route::get('/users', 'showUsers')->name('show-users');
        Route::delete('/delete-user/{user_id}', 'deleteUser')->name('delete-user');
        Route::delete('/delete-item/{item_id}', 'deleteItem')->name('delete-item');
    });
});
