<?php

namespace App\Exports;

use App\Models\ZakatFitrah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ZakatFitrahExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ZakatFitrah::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Nama Muzaki',
            'Alamat',
            'Jumlah Jiwa',
            'Jenis Barang',
            'Jumlah Beras ( Kg )',
            'Nominal Zakat Fitrah ( Rp. )',
            'Nominal Fidyah ( Rp. )',
            'Total Uang ( Rp. )',
            'Total Beras ( Kg )',
            'Keterangan',
            'RT',
            'Created At',
            'Updated At',
        ];
    }
}
