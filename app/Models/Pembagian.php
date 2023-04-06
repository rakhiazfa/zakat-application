<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembagian extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'pembagian';

    /**
     * @var array
     */
    protected $fillable = [
        'jenis_penerima', 'persentase', 'jumlah_penerima',
    ];

    public function inputTotalUang(int|float $totalUang)
    {
        return ($this->persentase / 100) * $totalUang;
    }
}
