<?php

use App\Http\Controllers\Web\ZakatFitrahController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ZakatFitrahController::class, 'index']);

Route::get('/create', [ZakatFitrahController::class, 'create'])->name('.create');

Route::post('/', [ZakatFitrahController::class, 'store'])->name('.store');

Route::get('/{zakatFitrah}/edit', [ZakatFitrahController::class, 'edit'])->name('.edit');

Route::put('/{zakatFitrah}', [ZakatFitrahController::class, 'update'])->name('.update');

Route::delete('/{zakatFitrah}', [ZakatFitrahController::class, 'destroy'])->name('.destroy');
