<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\PelangganResetPasswordNotification;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pelanggan';
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'no_wa',
        'no_ktp_sim',
        'kontak_darurat',
        'alamat_asal',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PelangganResetPasswordNotification($token));
    }
}
