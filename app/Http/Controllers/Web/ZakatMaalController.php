<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ZakatMaal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakatMaalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakatMaal = ZakatMaal::all();

        return view('zakat_maal')->with('zakatMaal', $zakatMaal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zakat_maal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_muzaki' => ['required'],
            'alamat' => ['nullable'],
            'jenis_harta' => ['nullable'],
            'nominal_zakat_maal' => ['nullable', 'numeric'],
            'nominal_infaq_shedekah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
        ]);

        $total = (int) $request->input('nominal_zakat_maal') + (int) $request->input('nominal_infaq_shedekah');

        $request->merge([
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        ZakatMaal::create($request->all());

        return redirect()->route('zakat_maal')->with('success', 'Berhasil menambahkan zakat maal / infaq / shedekah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZakatMaal $zakatMaal)
    {
        return view('zakat_maal.edit')->with('zakatMaal', $zakatMaal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ZakatMaal $zakatMaal)
    {
        $request->validate([
            'nama_muzaki' => ['required'],
            'alamat' => ['nullable'],
            'jenis_harta' => ['nullable'],
            'nominal_zakat_maal' => ['nullable', 'numeric'],
            'nominal_infaq_shedekah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
        ]);

        $total = (int) $request->input('nominal_zakat_maal') + (int) $request->input('nominal_infaq_shedekah');

        $request->merge([
            'total' => $total,
            'user_id' => Auth::id(),
        ]);

        $zakatMaal->update($request->all());

        return redirect()->route('zakat_maal')->with('success', 'Berhasil memperbarui zakat maal / infaq / shedekah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZakatMaal $zakatMaal)
    {
        $zakatMaal->delete();

        return redirect()->route('zakat_maal')->with('success', 'Berhasil menghapus zakat maal / infaq / shedekah.');
    }
}
