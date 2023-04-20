<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'pengeluaran';

    /**
     * @var array
     */
    protected $fillable = [
        'keterangan', 'nominal',
    ];

    public static function getTotalPengeluaran(): float
    {
        return self::sum('nominal');
    }
}
