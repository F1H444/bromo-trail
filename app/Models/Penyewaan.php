<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';
    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'id_motor',
        'id_admin',
        'tgl_mulai',
        'tgl_kembali',
        'total_biaya',
        'status_sewa',
    ];

    protected $casts = [
        'tgl_mulai' => 'datetime',
        'tgl_kembali' => 'datetime',
        'total_biaya' => 'decimal:2',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');
    }

    public function details()
    {
        return $this->hasMany(DetailSewa::class, 'id_penyewaan');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_penyewaan');
    }

    public function cekKondisi()
    {
        return $this->hasMany(CekKondisi::class, 'id_penyewaan');
    }
}
