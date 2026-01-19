<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TambahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tambahan')->insert([
            [
                'nama_item' => 'Helm Full Face',
                'stok_total' => 10,
                'harga_satuan' => 25000,
                'gambar_url' => 'https://placehold.co/200x200/18181b/ffffff?text=Helm',
            ],
            [
                'nama_item' => 'Goggle Scott',
                'stok_total' => 15,
                'harga_satuan' => 15000,
                'gambar_url' => 'https://placehold.co/200x200/18181b/ffffff?text=Goggle',
            ],
            [
                'nama_item' => 'Gloves / Sarung Tangan',
                'stok_total' => 20,
                'harga_satuan' => 10000,
                'gambar_url' => 'https://placehold.co/200x200/18181b/ffffff?text=Gloves',
            ],
            [
                'nama_item' => 'Sepatu Boots Trail',
                'stok_total' => 8,
                'harga_satuan' => 35000,
                'gambar_url' => 'https://placehold.co/200x200/18181b/ffffff?text=Boots',
            ],
            [
                'nama_item' => 'Body Protector',
                'stok_total' => 5,
                'harga_satuan' => 30000,
                'gambar_url' => 'https://placehold.co/200x200/18181b/ffffff?text=Armor',
            ],
        ]);
    }
}
