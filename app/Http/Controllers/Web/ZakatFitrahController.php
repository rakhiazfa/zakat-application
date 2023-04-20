<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $q = $request->get('q', false);

        $zakatFitrah = $user->hasRole('Amil Zakat') ? $user->zakatFitrah()->when($q, function ($query) use ($q) {
            $query->where('nama_muzaki', 'LIKE', "%$q%");
        })->get() : ZakatFitrah::when($q, function ($query) use ($q) {
            $query->where('nama_muzaki', 'LIKE', "%$q%");
        })->get();

        return view('zakat_fitrah')->with('zakatFitrah', $zakatFitrah);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zakatPerJiwaUang = ZakatPerJiwa::where('key', 'uang')->first()->nominal ?? 0;
        $zakatPerJiwaBeras = ZakatPerJiwa::where('key', 'beras')->first()->nominal ?? 0;

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '!=', 'Super Admin');
        })->with('roles')->get();

        return view('zakat_fitrah.create')->with([
            'zakatPerJiwaUang' => $zakatPerJiwaUang,
            'zakatPerJiwaBeras' => $zakatPerJiwaBeras,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

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
                'tanggal' => date('Y-m-d'),
            ]);
        }

        $request->validate([
            'nama_muzaki' => ['required'],
            'jumlah_jiwa' => ['required', 'numeric'],
            'alamat' => ['nullable'],
            'jumlah_beras' => ['nullable', 'numeric'],
            'nominal_zakat_fitrah' => ['nullable', 'numeric'],
            'nominal_fidyah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
            'user_id' => ['required'],
        ]);

        ZakatFitrah::create($request->all());

        return redirect()->route('zakat_fitrah')->with('success', 'Berhasil menambahkan zakat fitrah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZakatFitrah $zakatFitrah)
    {
        $zakatPerJiwaUang = ZakatPerJiwa::where('key', 'uang')->first()->nominal ?? 0;
        $zakatPerJiwaBeras = ZakatPerJiwa::where('key', 'beras')->first()->nominal ?? 0;

        return view('zakat_fitrah.edit')->with([
            'zakatPerJiwaUang' => $zakatPerJiwaUang,
            'zakatPerJiwaBeras' => $zakatPerJiwaBeras,
            'zakatFitrah' => $zakatFitrah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ZakatFitrah $zakatFitrah)
    {
        if ($request->input('jenis_barang') == 'uang') {

            $total = (float) $request->input('nominal_fidyah') + (float) $request->input('nominal_zakat_fitrah');

            $request->merge([
                'jumlah_beras' => null,
                'total_beras' => null,
                'total_uang' => $total,
            ]);
        } elseif ($request->input('jenis_barang') == 'beras') {

            $total = (float) $request->input('jumlah_beras');

            $request->merge([
                'nominal_zakat_fitrah' => null,
                'total_uang' => null,
                'total_beras' => $total,
            ]);
        }

        $request->validate([
            'nama_muzaki' => ['required'],
            'jumlah_jiwa' => ['required', 'numeric'],
            'alamat' => ['nullable'],
            'jumlah_beras' => ['nullable', 'numeric'],
            'nominal_zakat_fitrah' => ['nullable', 'numeric'],
            'nominal_fidyah' => ['nullable', 'numeric'],
            'keterangan' => ['nullable'],
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
