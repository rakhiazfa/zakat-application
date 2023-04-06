<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'username',
        'password',
        'is_online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var array
     */
    protected $appends = ['avatar_link'];

    public function getAvatarLinkAttribute(): string
    {
        return $this->avatar ? url('storage/' . $this->avatar) : url('assets/images/avatars/default.png');
    }

    public function zakatFitrah(): HasMany
    {
        return $this->hasMany(ZakatFitrah::class, 'user_id', 'id');
    }

    public function zakatMaal(): HasMany
    {
        return $this->hasMany(ZakatMaal::class, 'user_id', 'id');
    }

    public function totalKK()
    {
        return $this->zakatFitrah->count();
    }

    public function totalJiwa()
    {
        return $this->zakatFitrah->sum('jumlah_jiwa');
    }

    public function totalZakatFitrah()
    {
        return $this->zakatFitrah->sum('nominal_zakat_fitrah');
    }

    public function totalFidyah()
    {
        return $this->zakatFitrah->sum('nominal_fidyah');
    }

    public function totalZakatMaal()
    {
        return $this->zakatMaal->sum('nominal_zakat_maal');
    }

    public function totalInfaqShedekah()
    {
        return $this->zakatMaal->sum('nominal_infaq_shedekah');
    }

    public function totalKeseluruhan()
    {
        return $this->totalZakatFitrah() + $this->totalZakatMaal() + $this->totalInfaqShedekah() + $this->totalFidyah();
    }
}
