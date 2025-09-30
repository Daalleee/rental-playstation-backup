<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id',
        'unit_ps_id',
        'game_id',
        'aksesoris_id',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'status_id'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function unitPs()
    {
        return $this->belongsTo(UnitPs::class);
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function aksesoris()
    {
        return $this->belongsTo(Aksesoris::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
