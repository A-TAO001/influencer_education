<?php

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
return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user_notice.index', [App\Http\Controllers\ArticleController::class, 'index'])->name('user_notice.index');

Route::get('/curriculum_progress', [App\Http\Controllers\CurriculumProgressController::class, 'curriculum_progress'])->name('progress');
Route::get('/curriculum/{id}', [App\Http\Controllers\CurriculumProgressController::class, 'curriculums'])->name('curriculum');

Route::get('/profile_show', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile_show');
Route::post('/profile_update', [App\Http\Controllers\UserProfileController::class, 'profileUpdate'])->name('profile_update');

Route::get('/password_change', [App\Http\Controllers\UserProfileController::class, 'password'])->name('password_edit');
Route::post('/password_update', [App\Http\Controllers\UserProfileController::class, 'passwordUpdate'])->name('password_update');

Route::get('/admin_notice_index', [App\Http\Controllers\AdminNoticeController::class, 'index'])->name('admin_notice_index');
Route::get('/admin_notice_create', [App\Http\Controllers\AdminNoticeController::class, 'create'])->name('admin_notice_create');
Route::get('/admin_notice_edit/{id}', [App\Http\Controllers\AdminNoticeController::class, 'edit'])->name('admin_notice_edit');
Route::post('/admin_notice.store', [App\Http\Controllers\AdminNoticeController::class, 'store'])->name('admin_notice.store');
Route::post('/admin_notice.update/{id}', [App\Http\Controllers\AdminNoticeController::class, 'update'])->name('admin_notice.update');
Route::get('/admin_notice.delete/{id}', [App\Http\Controllers\AdminNoticeController::class, 'destroy'])->name('admin_notice.delete');
