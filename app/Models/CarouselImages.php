<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImages extends Model
{
    /** @use HasFactory<\Database\Factories\CarouselImagesFactory> */
    use HasFactory;

    protected $table = 'carouselImage';

    protected $fillable = [
        'image',
        'caption'
    ];

}
