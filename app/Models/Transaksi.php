<?php

namespace App\Models;

use App\Enums\UnitPSStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'unit_ps_id',
        'game_id',
        'aksesoris_id',
        'durasi',
        'biaya',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'status',
        'denda',
    ];

    protected $casts = [
        'waktu_peminjaman' => 'datetime',
        'waktu_pengembalian' => 'datetime',
        'biaya' => 'decimal:2',
        'denda' => 'decimal:2',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function unitPS()
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

    public static function createPeminjaman(array $data)
    {
        if ($data['unit_ps_id']) {
            UnitPs::handlePeminjaman($data['unit_ps_id'], $data['durasi']);
        }
        // Tambahkan logika untuk Game/Aksesoris jika perlu
        return self::create([
            'pelanggan_id' => $data['pelanggan_id'],
            'unit_ps_id' => $data['unit_ps_id'] ?? null,
            'game_id' => $data['game_id'] ?? null,
            'aksesoris_id' => $data['aksesoris_id'] ?? null,
            'durasi' => $data['durasi'],
            'biaya' => $data['biaya'],
            'waktu_peminjaman' => now(),
            'status' => 'Sedang Disewa',
            'denda' => 0,
        ]);
    }

    public function markAsReturned(string $kondisi)
    {
        $this->update([
            'waktu_pengembalian' => now(),
            'status' => 'Selesai',
        ]);
        if ($this->unit_ps_id) {
            UnitPs::handlePengembalian($this->unit_ps_id, $kondisi);
        }
        // Tambahkan logika untuk Game/Aksesoris jika perlu
        return $this;
    }

    public function scopePeminjaman($query)
    {
        return $query->where('status', 'Sedang Disewa');
    }

    public function scopePengembalian($query)
    {
        return $query->where('status', 'Selesai');
    }
}
