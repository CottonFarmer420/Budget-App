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
Route::get('/finance', [FinancesController::class, 'index'])->middleware(['auth'])->name('finance.index');
Route::post('/finance', [FinancesController::class, 'store'])
    ->name('finance.store');
Route::delete('/finance/{finance}', [FinancesController::class, 'destroy'])
    ->name('finance.destroy');
Route::get('/finance/{id}/edit', [FinancesController::class, 'edit'])
    ->name('finance.edit');
Route::put('/finance/{id}', [FinancesController::class, 'update'])
    ->name('finance.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
