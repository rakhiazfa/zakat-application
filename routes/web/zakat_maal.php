<?php

use App\Http\Controllers\Web\ZakatMaalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ZakatMaalController::class, 'index']);

Route::get('/create', [ZakatMaalController::class, 'create'])->name('.create');

Route::post('/', [ZakatMaalController::class, 'store'])->name('.store');

Route::get('/{zakatMaal}/edit', [ZakatMaalController::class, 'edit'])->name('.edit');

Route::put('/{zakatMaal}', [ZakatMaalController::class, 'update'])->name('.update');

Route::delete('/{zakatMaal}', [ZakatMaalController::class, 'destroy'])->name('.destroy');
