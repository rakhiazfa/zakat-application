<?php

namespace App\Exports;

use App\Models\ZakatFitrah;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ZakatFitrahSheet implements FromQuery, WithHeadings, WithTitle, WithColumnWidths, WithStyles
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
        return ZakatFitrah::query()->where('user_id', $this->userId);
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
            'F' => 15,
            'G' => 20,
            'H' => 25,
            'I' => 25,
            'J' => 20,
            'K' => 20,
            'L' => 25,
            'M' => 10,
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
            'F' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
