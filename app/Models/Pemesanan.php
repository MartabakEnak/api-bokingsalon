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
        'name',
        'phone_number',
        'booking_date',
        'booking_time',
        'status',
        'total_price',
    ];

    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'pemesanan_layanan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
