<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancesController;
use Illuminate\Http\Request;
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

Route::middleware('auth')->get('/token', function (Request $request) {
    if (!$request->user()) {
        return response()->json(['error' => 'Nicht eingeloggt'], 401);
    }

    $token = $request->user()->createToken('browser-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::middleware('auth')->get('/token', function (Request $request) {
    $token = $request->user()->createToken('browser-token')->plainTextToken;
    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->get('/finances', function (Request $request) {
    return response()->json($request->user()->finances);
});



require __DIR__.'/auth.php';
