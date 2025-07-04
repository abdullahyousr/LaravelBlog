<?php

use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// Product routes
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products/{product}/add-to-cart', [ProductController::class, 'addToCart'])->name('products.addToCart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    
    Route::post('Posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    
    // Cart routes (require authentication)
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/order', [CartController::class, 'order'])->name('cart.order');
});

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
