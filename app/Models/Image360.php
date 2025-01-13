<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image360 extends Model
{
    protected $table = '360images';

    protected $fillable = [
        'wisata_id',
        'produk_id',
        'path',
    ];
}
