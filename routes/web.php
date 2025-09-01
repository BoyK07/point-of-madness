<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('index');

// Placeholder routes for navigation items
Route::get('/events', function () {
    return view('events.index');
})->name('events.index');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.index');

// Future blogs route (currently unused)
Route::get('/blogs', function () {
    return view('blogs.index');
})->name('blogs.index');

// Profile routes (still require auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
