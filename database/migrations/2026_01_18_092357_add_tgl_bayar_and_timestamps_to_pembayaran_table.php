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
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->date('tgl_bayar')->nullable()->after('id_penyewaan');
            $table->renameColumn('bukti_bayar', 'bukti_bayar_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn(['tgl_bayar', 'created_at', 'updated_at']);
            $table->renameColumn('bukti_bayar_url', 'bukti_bayar');
        });
    }
};
