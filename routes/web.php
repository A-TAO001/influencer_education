<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserDeliveryController;
use App\Http\Controllers\UserTopController;

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

    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // ログインユーザーのみアクセス可能なルート
    Route::middleware(['auth'])->group(function () {
        Route::get('/user_top', [UserTopController::class, 'showPage'])->name('user.top');
        Route::get('/articles/{id}', [UserTopController::class, 'show'])->name('articles.show');
        Route::put('/user_delivery/{id}', [UserDeliveryController::class, 'markAsCompleted'])->name('mark.as.completed');
        Route::get('/user_delivery/{id}', [UserDeliveryController::class, 'showPage'])->name('user.delivery');
    });