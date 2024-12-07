<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $fillable = [
        'id_user',
        'id_produk',
        'type',
        'name',
        'alamat',
        'no_hp',
        'bukti_pembayaran',
        'jumlah',
        'total_harga'
    ];
}
