<?php

use App\Http\Controllers\Web\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SettingController::class, 'index']);

Route::put('/update-zakat-per-jiwa', [SettingController::class, 'updateZakatPerJiwa'])->name('.update_zakat_per_jiwa');
