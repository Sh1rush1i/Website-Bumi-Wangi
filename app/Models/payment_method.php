<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment_method extends Model
{
    protected $fillable = [
        'jenis',
        'nama',
        'pemilik',
        'no_rek',
    ];
}
