<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\AccessLinkAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistrationController::class, 'index'])->name('home');
Route::post('/registration', [RegistrationController::class, 'register'])->name('register');

Route::prefix('game/{token}')
    ->name('game.')
    ->middleware(AccessLinkAuth::class)
    ->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('index');
        Route::post('/regenerate', [GameController::class, 'regenerate'])->name('regenerate');
        Route::post('/deactivate', [GameController::class, 'deactivate'])->name('deactivate');
    });
