<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/monat', function () {
    return view('Monatsformular');
})->middleware(['auth', 'verified'])->name('monatsformular');

Route::post('/monat', [FinancesController::class, 'store'])->name('finances.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
