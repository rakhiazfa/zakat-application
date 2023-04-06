<?php

use App\Http\Controllers\Web\ZakatMaalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ZakatMaalController::class, 'index']);
