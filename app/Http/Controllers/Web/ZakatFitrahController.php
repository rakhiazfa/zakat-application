<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ZakatFitrah;
use App\Models\ZakatPerJiwa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakatFitrahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $zakatFitrah = $user->hasRole('Amil Zakat') ? $user->zakatFitrah : ZakatFitrah::all();

        return view('zakat_fitrah')->with('zakatFitrah', $zakatFitrah);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zakatPerJiwa = ZakatPerJiwa::first()->nominal;

        return view('zakat_fitrah.create')->with('zakatPerJiwa', $zakatPerJiwa);
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'keterangan' => ['nullable'],
        ]);

        $nominalZakatFitrah = (int) $request->input('jumlah_beras_diuangkan', 0) + (int) $request->input('nominal_zakat_fitrah');

        $total = $nominalZakatFitrah + (int) $request->input('nominal_fidyah');

        $request->merge([
            'nominal_zakat_fitrah' => $nominalZakatFitrah,
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        ZakatFitrah::create($request->all());

        return redirect()->route('zakat_fitrah')->with('success', 'Berhasil menambahkan zakat fitrah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZakatFitrah $zakatFitrah)
    {
        $zakatPerJiwa = ZakatPerJiwa::first()->nominal;

        return view('zakat_fitrah.edit')->with([
            'zakatPerJiwa' => $zakatPerJiwa,
            'zakatFitrah' => $zakatFitrah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ZakatFitrah $zakatFitrah)
    {
        $request->validate([
            'nama_muzaki' => ['required'],
            'jumlah_jiwa' => ['required', 'numeric'],
            'alamat' => ['nullable'],
            'jumlah_beras' => ['nullable'],
            'jumlah_beras_diuangkan' => ['nullable', 'numeric'],
            'nominal_zakat_fitrah' => ['nullable', 'numeric'],
            'nominal_fidyah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
        ]);

        $nominalZakatFitrah = (int) $request->input('jumlah_beras_diuangkan', 0) + (int) $request->input('nominal_zakat_fitrah');

        $total = $nominalZakatFitrah + (int) $request->input('nominal_fidyah');

        $request->merge([
            'nominal_zakat_fitrah' => $nominalZakatFitrah,
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        $zakatFitrah->update($request->all());

        return redirect()->route('zakat_fitrah')->with('success', 'Berhasil memperbarui zakat fitrah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZakatFitrah $zakatFitrah)
    {
        $zakatFitrah->delete();

        return redirect()->route('zakat_fitrah')->with('success', 'Berhasil menghapus zakat fitrah.');
    }
}
