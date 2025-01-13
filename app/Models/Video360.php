<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video360 extends Model
{
    protected $table = '360videos';

    protected $fillable = [
        'wisata_id',
        'produk_id',
        'path',
    ];
}
