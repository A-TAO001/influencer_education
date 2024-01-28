<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/articles/{id}', [App\Http\Controllers\UserTopController::class, 'show'])->name('articles.show');


// Route::get('/user_top', [App\Http\Controllers\UserTopController::class, 'index'])->name('user_top');
// Route::get('/user_top', [App\Http\Controllers\BannersController::class, 'showBanner'])->name('showBanner');
// Route::get('/user_top', [App\Http\Controllers\UserTopController::class, 'showArticle'])->name('showArticle');