<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\User;


class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'no_telepon' => 'required|string|max:20',
            'tanggal.*' => 'nullable|date',
            'jam.*' => 'nullable',
            'layanan_id.*' => 'nullable|integer',
        ]);

        $user = Auth::user();

        // Loop dua pemesanan
        for ($i = 0; $i < 2; $i++) {
            if (!empty($request->tanggal[$i]) && !empty($request->jam[$i]) && !empty($request->layanan_id[$i])) {
                Pemesanan::create([
                    'user_id' => $user->id ?? null,
                    'nama_pelanggan' => $user->name ?? 'Guest',
                    'no_telepon' => $request->no_telepon,
                    'layanan_id' => $request->layanan_id[$i],
                    'tanggal' => $request->tanggal[$i],
                    'jam' => $request->jam[$i],
                    'status_pembayaran' => 'belum_bayar',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Pemesanan berhasil disimpan!');
    }
    public function index()
{
    $user = Auth::user();
    $pesanan = Pemesanan::where('user_id', $user->id)->get();

    return response()->json($pesanan);
}


public function riwayat()
{
    $user = Auth::user(); // ambil user yang sedang login
    $pemesanan = Pemesanan::with('layanan')->where('user_id', $user->id)->get();

    return view('riwayat', compact('pemesanan'));

}
public function cetak($id)
{
    $pemesanan = Pemesanan::with(['layanan', 'user'])->findOrFail($id);

    return view('cetak', compact('pemesanan'));
}
public function tampilkanQR($id)
{
    $pesanan = Pemesanan::with('layanan')->findOrFail($id);

    // Simulasi data QR
    $qrData = 'https://example.com/bayar/' . $pesanan->id;

    return view('qr', compact('pesanan', 'qrData'));
}




}
