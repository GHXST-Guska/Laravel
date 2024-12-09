<?php

use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontPageController::class, 'index'])->name('landing');
Route::get('/about/{id}', [FrontPageController::class, 'about'])->name( 'about');
Route::get('/gallery', [FrontPageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [FrontPageController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/guitars', [AdminController::class, 'index'])->name('admin.guitars');
        Route::post('/guitars', [AdminController::class, 'store'])->name('admin.guitars.store');
        Route::get('/guitars/create', [AdminController::class, 'create'])->name('admin.guitars.create');
        Route::put('/guitars/{id}', [AdminController::class, 'update'])->name('admin.guitars.update');
        Route::get('/guitars/{id}/edit', [AdminController::class, 'edit'])->name('admin.guitars.edit');
        Route::delete('/guitars/{id}', [AdminController::class, 'destroy'])->name('admin.guitars.destroy');
    });
});

require __DIR__.'/auth.php';