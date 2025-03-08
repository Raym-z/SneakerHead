<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FirebaseUploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

require __DIR__.'/auth.php';

// Home Page (Merged with Dashboard)
Route::get('/', [ProductController::class, 'index'])->name('home');

// Profile Routes (For Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Search Page
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Firebase Upload Routes
Route::get('/upload', [FirebaseUploadController::class, 'showUploadForm']);
Route::post('/upload', [FirebaseUploadController::class, 'uploadImage']);
