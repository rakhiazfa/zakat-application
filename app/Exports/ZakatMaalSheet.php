<?php

namespace App\Exports;

use App\Models\ZakatMaal;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ZakatMaalSheet implements FromQuery, WithHeadings, WithTitle
{
    public function __construct(public string $userId, public string $title)
    {
        // 
    }

     /**
     * @return Builder
     */
    public function query()
    {
        return ZakatMaal::query()->where('user_id', $this->userId);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
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
            'USER ID',
            'Created At',
            'Updated At',
        ];
    }
}
