<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aksesoris extends Model
{
    use HasFactory;

    protected $fillable = ['jenis', 'jumlah', 'kondisi', 'status'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
