<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'platform', 'kondisi', 'status', 'foto'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
