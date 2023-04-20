<?php

namespace App\Exports;

use App\Models\ZakatMaal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ZakatMaalExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ZakatMaal::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Nama Muzaki',
            'Alamat',
            'Jenis Harta',
            'Nominal Zakat Maal ( Rp. )',
            'Nominal Infaq / Shodaqoh ( Rp. )',
            'Total Uang ( Rp. )',
            'Keterangan',
            'USER ID',
            'Created At',
            'Updated At',
        ];
    }
}
