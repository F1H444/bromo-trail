<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambahan extends Model
{
    use HasFactory;

    protected $table = 'tambahan';
    public $timestamps = false;

    protected $fillable = [
        'nama_item',
        'stok_total',
        'harga_satuan',
        'gambar_url',
    ];

    protected $casts = [
        'harga_satuan' => 'decimal:2',
    ];
}
