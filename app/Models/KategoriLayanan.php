<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    protected $table = 'kategori_layanan';
    protected $fillable = ['name'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'kategori_id');
    }
}
