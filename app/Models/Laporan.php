<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laporan',
        'tanggal_awal',
        'tanggal_akhir',
        'data_laporan',
        'total_pendapatan',
        'jumlah_transaksi',
    ];

    protected $casts = [
        'data_laporan' => 'array',
        'tanggal_awal' => 'date',
        'tanggal_akhir' => 'date',
        'total_pendapatan' => 'decimal:2',
    ];

    // Relasi ke Transaksi (jika simpan laporan dari transaksi)
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'laporan_transaksi');
    }
}
