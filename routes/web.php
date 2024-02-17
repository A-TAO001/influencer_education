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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class,'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/user_top', [App\Http\Controllers\UserTopController::class, 'showPage'])->name('user_top');
Route::get('/articles/{id}', [App\Http\Controllers\UserTopController::class, 'show'])->name('articles_show');
Route::put('/user_delivery/{id}', [App\Http\Controllers\UserDeliveryController::class, 'markAsCompleted'])->name('mark_as_completed');
Route::get('/user_delivery/{id}', [App\Http\Controllers\UserDeliveryController::class, 'showPage'])->name('user_delivery');
