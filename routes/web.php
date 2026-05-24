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
    
    // Image management (Accessible by both admin and user roles for now)
    // Image management
    Route::get('/images', [ImageController::class, 'index'])->name('admin.images.index');
    
    Route::post('/images', [ImageController::class, 'store'])
        ->middleware('permission:add images')
        ->name('admin.images.store');
        
    Route::post('/images/{image}', [ImageController::class, 'update'])
        ->middleware('permission:edit images')
        ->name('admin.images.update');
        
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])
        ->middleware('permission:delete images')
        ->name('admin.images.destroy');

    // User management (Strictly for admin only)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::post('/users/{user}/role', [App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('admin.users.updateRole');
        Route::post('/users/{user}/permissions', [App\Http\Controllers\Admin\UserController::class, 'updatePermissions'])->name('admin.users.updatePermissions');

        // Site Settings
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    });
});

// Handle old .html URLs with a redirect
Route::get('/{slug}.html', function($slug) {
    return redirect('/' . $slug, 301);
});

Route::get('/index', function() {
    return redirect('/', 301);
});

Route::get('/video-stream', [PageController::class, 'streamVideo']);

Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');


