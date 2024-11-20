<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    /** @use HasFactory<\Database\Factories\WisataFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'satuan',
        'gambar',
        'video',
    ];
}
