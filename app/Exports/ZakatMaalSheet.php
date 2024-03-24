<?php

namespace App\Exports;

use App\Models\ZakatMaal;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ZakatMaalSheet implements FromQuery, WithHeadings, WithTitle, WithColumnWidths, WithStyles
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
            'Jenis Harta',
            'Nominal Zakat Maal ( Rp. )',
            'Nominal Infaq / Shodaqoh ( Rp. )',
            'Total Uang ( Rp. )',
            'Keterangan',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 25,
            'C' => 25,
            'D' => 25,
            'E' => 15,
            'F' => 25,
            'G' => 30,
            'H' => 25,
            'I' => 25,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            'E' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
