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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
            $table->foreignId('unit_ps_id')->nullable()->constrained('unit_ps');
            $table->foreignId('game_id')->nullable()->constrained('games');
            $table->foreignId('aksesoris_id')->nullable()->constrained('aksesoriss');
            $table->integer('durasi'); // Jam
            $table->decimal('biaya', 10, 2);
            $table->dateTime('waktu_peminjaman');
            $table->dateTime('waktu_pengembalian')->nullable();
            $table->string('status')->default('Sedang Disewa'); // 'Sedang Disewa', 'Selesai', 'Rusak'
            $table->decimal('denda', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
