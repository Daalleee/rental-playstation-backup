<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPemilik',
        'email',
        'username',
        'password',
    ];
}
