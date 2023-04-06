<?php

use App\Http\Controllers\Web\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', ProfileController::class);

Route::put('/profile', [ProfileController::class, 'update'])->name('.update');

Route::patch('/profile/change-password', [ProfileController::class, 'changePassword'])->name('.change_password');

Route::patch('/profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('.change_avatar');

Route::delete('/profile', [ProfileController::class, 'destroy'])->name('.destroy');
