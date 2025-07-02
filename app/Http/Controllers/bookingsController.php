<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index()
    {
        $bookings = Pemesanan::with('layanan')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam', 'desc')
            ->paginate(10);

        return view('admin.dashboard', compact('bookings'));
    }
}
