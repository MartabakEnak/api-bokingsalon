<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;

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

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
