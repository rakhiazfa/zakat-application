<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ZakatFitrah;
use App\Models\ZakatMaal;
use App\Models\ZakatPerJiwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function __invoke(Request $request)
    {
        $zakatPerJiwa = ZakatPerJiwa::first()->nominal;

        return view('pembayaran')->with('zakatPerJiwa', $zakatPerJiwa);
    }

    public function store(Request $request)
    {
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
        ]);

        // Zakat Fitrah

        $nominalZakatFitrah = (int) $request->input('jumlah_beras_diuangkan', 0) + (int) $request->input('nominal_zakat_fitrah');

        $total = $nominalZakatFitrah + (int) $request->input('nominal_fidyah');

        $request->merge([
            'nominal_zakat_fitrah' => $nominalZakatFitrah,
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        ZakatFitrah::create($request->all());

        // Zakat Maal

        $total = (int) $request->input('nominal_zakat_maal') + (int) $request->input('nominal_infaq_shedekah');

        $request->merge([
            'total' => $total,
        ]);

        ZakatMaal::create($request->all());

        return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil.');
    }
}
