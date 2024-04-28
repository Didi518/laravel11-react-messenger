<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profil.destroy');
});

require __DIR__.'/auth.php';
