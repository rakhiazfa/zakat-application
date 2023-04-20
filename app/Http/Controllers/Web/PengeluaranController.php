<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function __invoke()
    {
        $pengeluaran = Pengeluaran::orderBy('id', 'DESC')->get();

        return view('pengeluaran')->with('pengeluaran', $pengeluaran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => ['required'],
            'nominal' => ['required', 'numeric'],
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function destroy(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
