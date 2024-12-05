<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'tiktok',
        'youtube',
        'telepon',
        'email',
        'alamat',
        'whatsapp',
    ];
}
