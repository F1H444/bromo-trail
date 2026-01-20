<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motor';
    public $timestamps = true;

    protected $fillable = [
        'merk_tipe',
        'slug',
        'plat_nomor',
        'harga_sewa_per_hari',
        'status_motor',
        'gambar_url',
        'deskripsi_singkat',
        'spek_mesin',
        'kapasitas_tangki',
        'is_popular',
    ];


    protected $casts = [
        'is_popular' => 'boolean',
        'harga_sewa_per_hari' => 'decimal:2',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
