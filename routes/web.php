<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserBookController;

Route::get('/', [WelcomeController::class, 'welcome']);

Route::middleware(['auth', 'verified'])->name('dashboard')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user/books/{book}', [UserBookController::class, 'attach'])->name('user.books.attach');
    Route::get('/user/books/{book}', [UserBookController::class, 'attach'])->name('user.books.attach');
    Route::get('/user/books', [UserBookController::class, 'index'])->name('user.books.index');
    Route::delete('/user/books/{book}/detach', [UserBookController::class, 'detach'])->name('user.books.detach');
    
});

require __DIR__.'/auth.php';
