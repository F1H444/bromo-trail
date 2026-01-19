<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motor')->insert([
            [
                'merk_tipe' => 'Honda CRF 150L',
                'slug' => 'honda-crf-150l',
                'plat_nomor' => 'N 1234 AB',
                'harga_sewa_per_hari' => 150000,
                'status_motor' => 'Tersedia',
                'gambar_url' => 'https://astra-honda.net/storage/products/March2021/0XQW9w5FqZqY5k7l4Wf8.jpg',
                'deskripsi_singkat' => 'Motor trail tangguh untuk segala medan.',
                'spek_mesin' => '150cc',
                'kapasitas_tangki' => '7.2 Liter',
                'is_popular' => true,
            ],
            [
                'merk_tipe' => 'Kawasaki KLX 150',
                'slug' => 'kawasaki-klx-150',
                'plat_nomor' => 'N 5678 CD',
                'harga_sewa_per_hari' => 160000,
                'status_motor' => 'Disewa',
                'gambar_url' => 'https://content2.kawasaki.com/ContentStorage/NGP/Products/4929/8f092e07-6705-4f40-8422-50d4ce606e12.jpg?w=750',
                'deskripsi_singkat' => 'Pilihan favorit petualang Bromo.',
                'spek_mesin' => '150cc',
                'kapasitas_tangki' => '6.9 Liter',
                'is_popular' => true,
            ],
            [
                'merk_tipe' => 'Yamaha WR 155 R',
                'slug' => 'yamaha-wr-155-r',
                'plat_nomor' => 'N 9101 EF',
                'harga_sewa_per_hari' => 170000,
                'status_motor' => 'Tersedia',
                'gambar_url' => 'https://www.yamaha-motor.co.id/uploads/products/new_product_model_20231102102142.png',
                'deskripsi_singkat' => 'Performa mesin paling bertenaga di kelasnya.',
                'spek_mesin' => '155cc VVA',
                'kapasitas_tangki' => '8.1 Liter',
                'is_popular' => false,
            ],
            [
                'merk_tipe' => 'Kawasaki KLX 230',
                'slug' => 'kawasaki-klx-230',
                'plat_nomor' => 'N 2345 GH',
                'harga_sewa_per_hari' => 250000,
                'status_motor' => 'Tersedia',
                'gambar_url' => 'https://content2.kawasaki.com/ContentStorage/NGP/Products/4962/8d8a7e0f-9032-4e8a-8743-3b60388P0.jpg?w=750',
                'deskripsi_singkat' => 'Tenaga lebih besar untuk profesional.',
                'spek_mesin' => '233cc',
                'kapasitas_tangki' => '7.5 Liter',
                'is_popular' => true,
            ],
        ]);
    }
}
