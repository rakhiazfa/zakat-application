<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ZakatFitrah;
use App\Models\ZakatMaal;
use App\Models\ZakatPerJiwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function __invoke(Request $request)
    {
        $zakatPerJiwaUang = ZakatPerJiwa::where('key', 'uang')->first()->nominal ?? 0;
        $zakatPerJiwaBeras = ZakatPerJiwa::where('key', 'beras')->first()->nominal ?? 0;

        $users = User::role('Amil Zakat')->get();

        return view('pembayaran')->with([
            'zakatPerJiwaUang' => $zakatPerJiwaUang,
            'zakatPerJiwaBeras' => $zakatPerJiwaBeras,
            'users' => $users,
        ]);;
    }

    public function store(Request $request)
    {
        $user = $request->user();

        // Zakat Fitrah

        if ($request->input('jenis_barang') == 'uang') {

            $total = (float) $request->input('nominal_fidyah') + (float) $request->input('nominal_zakat_fitrah');

            $request->merge([
                'total_uang' => $total,
                'user_id' => $user->hasRole('Super Admin') ? $request->input('user_id') : Auth::id(),
                'tanggal' => date('Y-m-d'),
            ]);
        } elseif ($request->input('jenis_barang') == 'beras') {

            $total = (float) $request->input('jumlah_beras');

            $request->merge([
                'total_beras' => $total,
                'user_id' => $user->hasRole('Super Admin') ? $request->input('user_id') : Auth::id(),
            ]);
        }

        // Zakat Maal

        $total = (int) $request->input('nominal_zakat_maal') + (int) $request->input('nominal_infaq_shedekah');

        $request->merge([
            'total' => $total,
            'user_id' => $user->hasRole('Super Admin') ? $request->input('user_id') : Auth::id(),
        ]);

        $request->validate([
            'nama_muzaki' => ['required'],
            'jumlah_jiwa' => ['required', 'numeric'],
            'alamat' => ['nullable'],
            'jumlah_beras' => ['nullable'],
            'jumlah_beras_diuangkan' => ['nullable', 'numeric'],
            'nominal_zakat_fitrah' => ['nullable', 'numeric'],
            'nominal_fidyah' => ['nullable', 'numeric'],
            'jenis_harta' => ['nullable'],
            'nominal_zakat_maal' => ['nullable', 'numeric'],
            'nominal_infaq_shedekah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
            'user_id' => ['required'],
        ]);

        ZakatFitrah::create($request->all());

        if($total > 0) {
            ZakatMaal::create($request->all());
        }

        return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil.');
    }
}
