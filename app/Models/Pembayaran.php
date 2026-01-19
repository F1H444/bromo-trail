<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    public $timestamps = true;

    protected $fillable = [
        'id_penyewaan',
        'tgl_bayar',
        'jumlah_bayar',
        'metode_bayar',
        'bukti_bayar_url',
        'status_pembayaran',
        'catatan',
    ];

    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan');
    }
}
