<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitPs extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_seri', 'tipe_ps', 'kondisi', 'status'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
