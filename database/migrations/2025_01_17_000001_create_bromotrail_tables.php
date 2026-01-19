<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->unique();
            $table->string('password', 255);
            $table->enum('role', ['Admin', 'Owner']);
            // Timestamps are not in the SQL but good practice in Laravel. 
            // I will omitted them to strictly match SQL unless needed for models.
            // Adding them as nullable is a safe bet if models expect them, but SQL didn't have them.
            // User request was specific about SQL. I will stick to SQL columns.
        });

        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 255);
            $table->string('no_wa', 20);
            $table->string('no_ktp_sim', 50);
            $table->string('kontak_darurat', 50)->nullable();
            $table->text('alamat_asal')->nullable();
        });

        Schema::create('motor', function (Blueprint $table) {
            $table->id();
            $table->string('merk_tipe', 100);
            $table->string('slug', 150)->unique();
            $table->string('plat_nomor', 20)->unique();
            $table->decimal('harga_sewa_per_hari', 12, 2);
            $table->enum('status_motor', ['Tersedia', 'Disewa', 'Maintenance'])->default('Tersedia');
            $table->string('gambar_url', 255)->nullable();
            $table->string('deskripsi_singkat', 100)->nullable();
            $table->string('spek_mesin', 50)->nullable();
            $table->string('kapasitas_tangki', 50)->nullable();
            $table->boolean('is_popular')->default(false);
        });

        Schema::create('tambahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_item', 100);
            $table->integer('stok_total')->default(0);
            $table->decimal('harga_satuan', 12, 2);
            $table->string('gambar_url', 255)->nullable();
        });

        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('pelanggan');
            $table->foreignId('id_motor')->constrained('motor');
            $table->foreignId('id_admin')->nullable()->constrained('admin');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_kembali');
            $table->decimal('total_biaya', 15, 2)->default(0);
            $table->enum('status_sewa', ['Booking', 'Aktif', 'Selesai', 'Dibatalkan'])->default('Booking');
        });

        Schema::create('detail_sewa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penyewaan')->constrained('penyewaan')->onDelete('cascade');
            $table->foreignId('id_tambahan')->constrained('tambahan');
            $table->integer('jumlah')->default(1);
            $table->decimal('subtotal_harga', 15, 2);
        });

        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penyewaan')->constrained('penyewaan')->onDelete('cascade');
            $table->foreignId('id_admin')->nullable()->constrained('admin');
            $table->string('metode_bayar', 50);
            $table->decimal('jumlah_bayar', 15, 2);
            $table->enum('status_pembayaran', ['Pending', 'Lunas', 'Gagal'])->default('Pending');
            $table->string('bukti_bayar', 255)->nullable();
        });

        Schema::create('cek_kondisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penyewaan')->constrained('penyewaan')->onDelete('cascade');
            $table->foreignId('id_admin')->constrained('admin');
            $table->enum('waktu_cek', ['Ambil', 'Kembali']);
            $table->text('catatan_kondisi_fisik')->nullable();
            $table->string('foto_kondisi', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cek_kondisi');
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('detail_sewa');
        Schema::dropIfExists('penyewaan');
        Schema::dropIfExists('tambahan');
        Schema::dropIfExists('motor');
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('admin');
    }
};
