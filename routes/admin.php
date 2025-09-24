<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PhraseController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('users', UserController::class)->except('show');
        Route::resource('media', MediaController::class)->except('show');
        Route::resource('links', LinkController::class)->except('show');
        Route::resource('events', EventController::class)->except('show');
        Route::resource('phrases', PhraseController::class)->except('show');
    });
