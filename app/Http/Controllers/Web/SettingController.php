<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ZakatPerJiwa;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $zakatPerJiwa = ZakatPerJiwa::first()->nominal ?? 0;

        return view('settings')->with('zakatPerJiwa', $zakatPerJiwa);
    }

    public function updateZakatPerJiwa(Request $request)
    {
        $request->validate(['nominal' => ['required', 'numeric']]);

        ZakatPerJiwa::first()->update($request->all());

        return back()->with('success', 'Berhasil memperbarui zakat per jiwa.');
    }
}
