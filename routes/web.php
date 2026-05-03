<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

// Public Site
Route::get('/', [PageController::class, 'show']);

// Auth System
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard (Protected by Auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function() { return redirect()->route('admin.images.index'); });
    Route::get('/images', [ImageController::class, 'index'])->name('admin.images.index');
    Route::post('/images', [ImageController::class, 'store'])->name('admin.images.store');
    Route::post('/images/{image}', [ImageController::class, 'update'])->name('admin.images.update');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('admin.images.destroy');
});

// Handle old .html URLs with a redirect
Route::get('/{slug}.html', function($slug) {
    return redirect('/' . $slug, 301);
});

Route::get('/index', function() {
    return redirect('/', 301);
});

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
