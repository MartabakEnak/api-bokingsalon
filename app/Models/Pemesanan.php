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
        'user_id',
        'nama_pelanggan',
        'no_telepon',
        'layanan_id',
        'tanggal',
        'jam',
        'status_pembayaran',
        'user_id'
    ];

    public function layanan()
<<<<<<< HEAD
{
    return $this->belongsTo(Layanan::class, 'layanan_id');
}

    public function user()
{
    return $this->belongsTo(User::class);
}
=======
    {
       return $this->belongsTo(\App\Models\Layanan::class);
    }
>>>>>>> 1d3ce7a7e30c78f0ff25b72277b171db8c6c15ed
}
