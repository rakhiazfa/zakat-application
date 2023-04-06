<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZakatMaal extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'zakat_maal';

    /**
     * @var array
     */
    protected $fillable = [
        'tanggal', 'nama_muzaki', 'alamat', 'jenis_harta', 'nominal_zakat_maal',
        'nominal_infaq_shedekah', 'total', 'keterangan', 'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
