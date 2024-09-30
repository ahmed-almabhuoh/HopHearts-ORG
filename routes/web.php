<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'getWelcomePage'])->name('welcome');
Route::get('/{slug}', [WelcomeController::class, 'getBlogPage'])->name('blogs.pages.view');
Route::get('/jobs/{slug}', [WelcomeController::class, 'getJobPage'])->name('jobs.show');
Route::post('jobs/apply', [WelcomeController::class, 'jopApplying'])->name('jobs.apply');
Route::post('/', [WelcomeController::class, 'likeBlog'])->name('blogs.pages.like');
Route::post('/comment', [WelcomeController::class, 'commentOnBlog'])->name('blogs.pages.comment');


require __DIR__ . '/staff.php';
