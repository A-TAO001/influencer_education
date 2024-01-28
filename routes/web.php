<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\Delivery_timeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('curriculums.index');
    } else {
        return redirect()->route('login');
    }
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('curriculums', CurriculumController::class);
});

Route::get('/curriculums/filterByClass', 'CurriculumController@filterByClass')->name('curriculums.filterByClass');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('delivery_times', Delivery_timeController::class);
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');