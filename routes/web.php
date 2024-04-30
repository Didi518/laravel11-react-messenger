<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');

    Route::get('/utilisateur/{user}', [MessageController::class, 'byUser'])->name('chat.user');
    Route::get('/groupe/{group}', [MessageController::class, 'byGroup'])->name('chat.group');

    Route::post('/message', [MessageController::class, 'store'])->name('message.store');
    Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('/message/older/{message}', [MessageController::class, 'loadOlder'])->name('message.loadOlder');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profil.destroy');
});

require __DIR__.'/auth.php';
