<?php

use App\Http\Controllers\Web\PembagianController;
use Illuminate\Support\Facades\Route;

Route::get('/', PembagianController::class);

Route::put('/', [PembagianController::class, 'update'])->name('.update');
