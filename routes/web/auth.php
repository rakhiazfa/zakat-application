<?php

use App\Http\Controllers\Web\Auth\SignInController;
use App\Http\Controllers\Web\Auth\SignOutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::view('/signin', 'auth.signin')->name('.signin');

    Route::post('/signin', SignInController::class);
});


Route::middleware('auth:web')->get('/signout', SignOutController::class)->name('.signout');
