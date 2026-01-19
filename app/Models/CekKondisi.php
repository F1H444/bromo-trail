<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekKondisi extends Model
{
    use HasFactory;

    protected $table = 'cek_kondisi';
    public $timestamps = false;

    protected $fillable = [
        'id_penyewaan',
        'id_admin',
        'waktu_cek',
        'catatan_kondisi_fisik',
        'foto_kondisi',
    ];

    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
