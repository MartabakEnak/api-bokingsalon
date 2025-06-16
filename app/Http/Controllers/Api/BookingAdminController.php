<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    // ✅ Menampilkan semua data pemesanan + relasi layanan
    public function index()
    {
        $data = Pemesanan::with('layanan')->get();
        return response()->json($data);
    }

    // ✅ Konfirmasi status pembayaran
    public function confirm($id)
    {
        $booking = Pemesanan::findOrFail($id);
        $booking->status_pembayaran = 'diterima';
        $booking->save();

        return response()->json(['message' => 'Pemesanan berhasil dikonfirmasi']);
    }
}
