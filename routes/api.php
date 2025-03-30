<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/finance', [FinancesController::class, 'index']);

Route::middleware('auth:sanctum')->get('/finances', function (Request $request) {
    return $request->user()->finances;
});



