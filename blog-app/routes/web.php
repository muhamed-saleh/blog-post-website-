<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Public Routes ---
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// IMPORTANT: Specific 'create' route must come BEFORE the wildcard '{post}' route.
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


// --- Authenticated Routes ---
Route::middleware('auth')->group(function () {
    // Route for SUBMITTING a new post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // Breeze routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';