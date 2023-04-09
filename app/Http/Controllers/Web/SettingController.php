<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ZakatPerJiwa;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $zakatPerJiwaUang = ZakatPerJiwa::where('key', 'uang')->first()->nominal ?? 0;
        $zakatPerJiwaBeras = ZakatPerJiwa::where('key', 'beras')->first()->nominal ?? 0;

        return view('settings')->with([
            'zakatPerJiwaUang' => $zakatPerJiwaUang,
            'zakatPerJiwaBeras' => $zakatPerJiwaBeras,
        ]);
    }

    public function updateZakatPerJiwa(Request $request)
    {
        $request->validate(['nominal' => ['array']]);

        foreach ($request->input('nominal') as $key => $nominal) {

            ZakatPerJiwa::where('key', $key)->update(['nominal' => $nominal]);
        }

        return back()->with('success', 'Berhasil memperbarui zakat per jiwa.');
    }
}
