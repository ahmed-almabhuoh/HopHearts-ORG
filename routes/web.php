<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'getWelcomePage'])->name('welcome');
Route::get('/{slug}', [WelcomeController::class, 'getBlogPage'])->name('blogs.pages.view');
Route::post('/', [WelcomeController::class, 'likeBlog'])->name('blogs.pages.like');
Route::post('/comment', [WelcomeController::class, 'commentOnBlog'])->name('blogs.pages.comment');
