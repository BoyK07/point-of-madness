<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PhraseController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', AdminDashboardController::class)->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('media', MediaController::class)->except(['show']);
        Route::resource('links', LinkController::class);
        Route::resource('events', EventController::class);
        Route::resource('phrases', PhraseController::class)->except(['show']);
    });
