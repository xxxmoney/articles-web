<?php

use Illuminate\Support\Facades\Route;

// Get Controller
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
