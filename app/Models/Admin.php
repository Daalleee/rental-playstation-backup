<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAdmin';
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'username',
        'password',
    ];
}
