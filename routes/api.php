<?php

use App\Http\Controllers\BudgetController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->get('/budgets', function (Request $request) {
    return $request->user()->budgets;
});

Route::middleware('auth:sanctum')->get('/budgets/{id}', [BudgetController::class, 'showall']);



