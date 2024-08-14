<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomePageController;

Route::get('/', [WelcomePageController::class, 'index'])->name('welcome.index');


Route::get('/dev', function () {
    dd('dev');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
