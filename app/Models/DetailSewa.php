<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSewa extends Model
{
    use HasFactory;

    protected $table = 'detail_sewa';
    public $timestamps = false;

    protected $fillable = [
        'id_penyewaan',
        'id_tambahan',
        'jumlah',
        'subtotal_harga',
    ];

    protected $casts = [
        'subtotal_harga' => 'decimal:2',
    ];

    public function tambahan()
    {
        return $this->belongsTo(Tambahan::class, 'id_tambahan');
    }
}
