<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/{post}', [PostController::class, 'delete'])->name('post.delete');
require __DIR__.'/auth.php';
