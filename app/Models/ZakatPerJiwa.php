<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatPerJiwa extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'zakat_per_jiwa';

    /**
     * @var array
     */
    protected $fillable = ['nominal'];
}
