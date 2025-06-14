<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel pemesanan
        $data = Pemesanan::with('layanan')->get(); // penting!
        return view('admin.dashboard', compact('data'));
    }
    public function konfirmasi($id)
{
    $pemesanan = Pemesanan::findOrFail($id);
    $pemesanan->status_pembayaran = 'diterima';
    $pemesanan->save();

    return redirect()->route('admin.dashboard')->with('success', 'Pemesanan telah dikonfirmasi.');
}

}
