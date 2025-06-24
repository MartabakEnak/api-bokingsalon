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
    'snap_token',
    'no_antrean',
    'status_pengerjaan',

];

    public function layanan()
{
    return $this->belongsTo(Layanan::class, 'layanan_id');
}

    public function user()
{
    return $this->belongsTo(User::class);
}
}
