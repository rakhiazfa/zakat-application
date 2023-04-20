<?php

use App\Http\Controllers\Web\PengeluaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', PengeluaranController::class);

Route::post('/', [PengeluaranController::class, 'store'])->name('.store');

Route::delete('/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('.destroy');
