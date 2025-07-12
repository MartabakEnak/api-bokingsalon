<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = ['name', 'price', 'duration'];


    public function pemesanan()
    {
        return $this->belongsToMany(Pemesanan::class, 'pemesanan_layanan');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_id');
    }
}
