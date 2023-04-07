<?php

use App\Http\Controllers\Web\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', PembayaranController::class);

Route::post('/', [PembayaranController::class, 'store'])->name('.store');
