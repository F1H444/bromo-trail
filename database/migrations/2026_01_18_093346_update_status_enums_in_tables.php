<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Expand status_pembayaran enum
        DB::statement("ALTER TABLE pembayaran MODIFY COLUMN status_pembayaran ENUM('Pending', 'Menunggu Verifikasi', 'Lunas', 'Gagal') DEFAULT 'Pending'");

        // Expand status_sewa enum
        DB::statement("ALTER TABLE penyewaan MODIFY COLUMN status_sewa ENUM('Booking', 'Proses Verifikasi', 'Aktif', 'Selesai', 'Dibatalkan') DEFAULT 'Booking'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert status_pembayaran enum
        DB::statement("ALTER TABLE pembayaran MODIFY COLUMN status_pembayaran ENUM('Pending', 'Lunas', 'Gagal') DEFAULT 'Pending'");

        // Revert status_sewa enum
        DB::statement("ALTER TABLE penyewaan MODIFY COLUMN status_sewa ENUM('Booking', 'Aktif', 'Selesai', 'Dibatalkan') DEFAULT 'Booking'");
    }
};
