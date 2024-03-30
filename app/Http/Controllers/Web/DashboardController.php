<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pembagian;
use App\Models\User;
use App\Models\ZakatFitrah;
use App\Models\ZakatMaal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $userCount = User::count();
        $onlineUserCount = User::where('is_online', true)->count();

        $jumlahKK = ZakatFitrah::count();

        $totalZakatFitrah = ZakatFitrah::sum('total_uang');
        $totalZakatMaalInfakShedekah = ZakatMaal::sum('total');

        $totalUang = $totalZakatFitrah + $totalZakatMaalInfakShedekah;

        // 

        $amilZakat = User::role('Amil Zakat')->get();

        // 

        $pembagian = Pembagian::all();

        return view('dashboard')->with([
            'userCount' => $userCount,
            'onlineUserCount' => $onlineUserCount,
            'jumlahKK' => $jumlahKK,
            'totalUang' => $totalUang,
            'amilZakat' => $amilZakat,
            'pembagian' => $pembagian,
        ]);
    }
}
