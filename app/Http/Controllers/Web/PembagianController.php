<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pembagian;
use Illuminate\Http\Request;

class PembagianController extends Controller
{
    public function __invoke()
    {
        $pembagian = Pembagian::all();

        return view('pembagian')->with('pembagian', $pembagian);
    }

    public function update(Request $request)
    {
        $jumlahPenerima = $request->input('jumlah_penerima');

        foreach ($request->input('persentase') as $key => $value) {

            Pembagian::find($key)->update([
                'persentase' => (float) $value,
                'jumlah_penerima' => (int) $jumlahPenerima[$key],
            ]);
        }

        return back()->with('success', 'Berhasil memperbarui persentase pembagian.');
    }

    public function create()
    {
        return view('pembagian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_penerima' => ['required'],
            'persentase' => ['required', 'numeric'],
            'jumlah_penerima' => ['required', 'numeric'],
        ]);

        Pembagian::create($request->all());

        return redirect()->route('pembagian')->with('success', 'Penerima berhasil ditambahkan.');
    }

    public function destroy(Request $request, Pembagian $pembagian)
    {
        $pembagian->delete();

        return redirect()->route('pembagian')->with('success', 'Penerima berhasil dihapus.');
    }
}
