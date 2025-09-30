<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kasir extends Model
{
    use HasFactory;

    protected $fillable = [
        'idKasir',
        'email',
        'username',
        'password',
    ];
}
