<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [

        'nama_pelanggan',
        'no_telepon',
        'layanan_id',
        'tanggal',
        'jam',
        'status_pembayaran',
    ];
}
