<?php

namespace App\Models;

use App\Enums\UnitPSStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_seri',
        'tipe_ps',
        'kondisi',
        'status',
        'jumlah',
        'foto',
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'unit_ps_id');
    }
}
