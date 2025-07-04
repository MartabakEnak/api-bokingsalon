<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminDataPesananController extends Controller
{
    //php artisan make:controller Admin/DataPesananController
    public function index()
    {
        $pemesanans = Pemesanan::with('layanan')->latest()->get();

        return view('admin.data_pesanan', compact('pemesanans'));
        // atau: return view('admin.data_pesanan')->with('pemesanans', $pemesanans);
    }
    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('admin.data_pesanan')->with('success', 'Data pemesanan berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('admin.data_pesanan')->with('success', 'Data pemesanan berhasil dihapus.');
    }
}
