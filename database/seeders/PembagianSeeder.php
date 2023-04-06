<?php

namespace Database\Seeders;

use App\Models\Pembagian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembagian::create([
            'jenis_penerima' => 'FAKIR MISKIN',
            'persentase' => 61.5,
            'jumlah_penerima' => 39,
        ]);

        Pembagian::create([
            'jenis_penerima' => 'AMILIN',
            'persentase' => 12.5,
            'jumlah_penerima' => 1,
        ]);

        Pembagian::create([
            'jenis_penerima' => 'FISABILILLAH',
            'persentase' => 25.0,
            'jumlah_penerima' => 1,
        ]);

        Pembagian::create([
            'jenis_penerima' => 'UPZ KEL./KARANG TARUNA KEL.',
            'persentase' => 1.0,
            'jumlah_penerima' => 1,
        ]);
    }
}
