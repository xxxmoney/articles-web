<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

Auth::routes();

// Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Articles
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/articles/detail/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article_show');
Route::get('/articles/create', [App\Http\Controllers\ArticleController::class, 'showCreate'])->name('article_show_create');
Route::get('/articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'showEdit'])->name('article_show_edit');
Route::post('/articles/upsert', [App\Http\Controllers\ArticleController::class, 'upsert'])->name('article_upsert');
Route::post('/articles/delete', [App\Http\Controllers\ArticleController::class, 'delete'])->name('article_delete_post');
