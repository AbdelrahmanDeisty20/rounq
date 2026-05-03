<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ImageController;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'show']);

Route::prefix('admin')->group(function () {
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
