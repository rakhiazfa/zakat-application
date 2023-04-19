<?php

use App\Http\Controllers\Web\PembagianController;
use Illuminate\Support\Facades\Route;

Route::get('/', PembagianController::class);

Route::put('/', [PembagianController::class, 'update'])->name('.update');

Route::get('/create', [PembagianController::class, 'create'])->name('.create');

Route::post('/', [PembagianController::class, 'store'])->name('.store');

Route::delete('/{pembagian}', [PembagianController::class, 'destroy'])->name('.destroy');
