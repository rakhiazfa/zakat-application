<?php

use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return redirect()->route('auth.signin');
});

Route::name('dashboard')->middleware('auth:web', 'preventBackHistory')->group(base_path('routes/web/dashboard.php'));

Route::name('profile')->middleware('auth:web')->group(base_path('routes/web/profile.php'));

Route::name('auth')->prefix('auth')->group(base_path('routes/web/auth.php'));

Route::name('users')->prefix('users')->middleware('auth:web', 'role:Super Admin')->group(base_path('routes/web/users.php'));

Route::name('settings')->prefix('settings')->middleware('auth:web', 'role:Super Admin')->group(base_path('routes/web/settings.php'));

Route::name('zakat_fitrah')->prefix('zakat-fitrah')->middleware('auth:web')->group(base_path('routes/web/zakat_fitrah.php'));

Route::name('zakat_maal')->prefix('zakat-maal')->middleware('auth:web')->group(base_path('routes/web/zakat_maal.php'));

Route::name('pembagian')->prefix('pembagian')->middleware('auth:web', 'role:Super Admin')->group(base_path('routes/web/pembagian.php'));
