<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budgets/{budget}/add_expenses', [BudgetController::class, 'addExpenses'])->name('budget.add_expenses');
    Route::post('/budgets/{budget}/store_expense', [BudgetController::class, 'storeExpense'])->name('budget.store_expense');
    Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budget.show');

// Route für das Bearbeiten eines Budgets
    Route::get('/budgets/{id}/edit', [BudgetController::class, 'edit'])->name('budget.edit');

// Route für das Speichern eines bearbeiteten Budgets
    Route::put('/budgets/{id}', [BudgetController::class, 'update'])->name('budget.update');

// Route für das Löschen eines Budgets
    Route::delete('/budgets/{id}', [BudgetController::class, 'destroy'])->name('budget.destroy');

    // Routen für das Hinzufügen, Bearbeiten und Löschen von Ausgaben
    Route::get('/expense/{id}/edit', [BudgetController::class, 'editExpense'])->name('expense.edit');
    Route::put('/expense/{id}', [BudgetController::class, 'updateExpense'])->name('expense.update');
    Route::delete('/expense/{id}', [BudgetController::class, 'destroyExpense'])->name('expense.destroy');
});

Route::middleware('auth')->get('/token', function (Request $request) {
    $token = $request->user()->createToken('browser-token')->plainTextToken;
    return view('token', ['token' => $token]); // Token an die View übergeben
})->name('showToken');

/*
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
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
