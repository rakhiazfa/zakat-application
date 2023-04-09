<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZakatFitrah extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'zakat_fitrah';

    /**
     * @var array
     */
    protected $fillable = [
        'tanggal', 'nama_muzaki', 'alamat', 'jumlah_jiwa', 'jenis_barang', 'nominal_zakat_fitrah',
        'jumlah_beras', 'nominal_fidyah', 'total_uang', 'total_beras', 'keterangan', 'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
