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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_laporan'); // e.g., 'transaksi', 'pendapatan', 'performa'
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->json('data_laporan'); // Simpan data sebagai JSON (total pendapatan, jumlah transaksi, dll.)
            $table->decimal('total_pendapatan', 10, 2)->nullable();
            $table->integer('jumlah_transaksi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
