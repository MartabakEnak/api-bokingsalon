<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class PemesananController extends Controller
{
    public function index()
    {
        return response()->json(Pemesanan::with('layanan')->get());
    }

    public function store(Request $request)
{
    $request->validate([
        'no_telepon' => 'required|string|max:20',
        'tanggal.*' => 'nullable|date',
        'jam.*' => 'nullable',
        'layanan_id.*' => 'nullable|integer|exists:layanan,id',
    ]);

    $user = Auth::user();
    $saved = [];
    $pemesananPertama = null;

    for ($i = 0; $i < 2; $i++) {
    if (!empty($request->tanggal[$i]) && !empty($request->jam[$i]) && !empty($request->layanan_id[$i])) {

        $jumlahAntrean = Pemesanan::where('tanggal', $request->tanggal[$i])
            ->where('jam', '<=', $request->jam[$i])
            ->count();

        $pesanan = Pemesanan::create([
            'user_id' => $user->id ?? null,
            'nama_pelanggan' => $user->name ?? 'Guest',
            'no_telepon' => $request->no_telepon,
            'layanan_id' => $request->layanan_id[$i],
            'tanggal' => $request->tanggal[$i],
            'jam' => $request->jam[$i],
            'status_pembayaran' => 'belum_bayar',
            'no_antrean' => $jumlahAntrean + 1, // ← ini wajib
        ]);

        if ($pemesananPertama === null) {
            $pemesananPertama = $pesanan;
        }

        $saved[] = $pesanan;
    }
}

    if (!$pemesananPertama) {
        return redirect()->back()->with('error', 'Pemesanan gagal disimpan.');
    }

    return redirect()->route('bayar', $pemesananPertama->id);
}

public function riwayat()
{
    $user = Auth::user(); // ambil user yang sedang login
    $pemesanan = Pemesanan::with('layanan')->where('user_id', $user->id)->get();

    return view('riwayat', compact('pemesanan'));

}

public function riwayat2()
{
    $user = Auth::user(); // ambil user yang sedang login
    $pemesanan = Pemesanan::with('layanan')->where('user_id', $user->id)->get();

    return view('riwayat2', compact('pemesanan'));

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

    public function show($id)
    {
        $pemesanan = Pemesanan::with('layanan')->findOrFail($id);
        return response()->json($pemesanan);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'layanan_id' => 'required|integer|exists:layanan,id',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'layanan_id' => $request->layanan_id,
        ]);

        return response()->json([
            'message' => 'Data pemesanan berhasil diupdate.',
            'data' => $pemesanan
        ]);
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return response()->json([
            'message' => 'Pemesanan berhasil dihapus.'
        ]);
    }

    public function confirm($id)
{
    $pemesanan = Pemesanan::findOrFail($id);

    // Cek apakah status belum diterima
    if ($pemesanan->status_pembayaran !== 'diterima') {
        // Hitung antrean terakhir pada hari dan tanggal yang sama
        $nomorTerakhir = Pemesanan::where('tanggal', $pemesanan->tanggal)
                            ->whereNotNull('no_antrean')
                            ->max('no_antrean');

        // Buat antrean baru: +1 dari antrean terakhir, atau 1 jika belum ada
        $pemesanan->no_antrean = $nomorTerakhir ? $nomorTerakhir + 1 : 1;
        $pemesanan->status_pembayaran = 'diterima';
        $pemesanan->save();
    }

    return response()->json(['message' => 'Status pembayaran dikonfirmasi dan nomor antrean dibuat.']);
}



    public function userBookings()
    {
        $user = Auth::user();
        $pesanan = Pemesanan::where('user_id', $user->id)->with('layanan')->get();

        return response()->json($pesanan);
    }
//     public function antreanSekarang(Request $request)
// {
//     $tanggalHariIni = now()->format('Y-m-d');

//     // Ambil antrean terakhir yang sudah diterima hari ini
//     $last = Pemesanan::where('tanggal', $tanggalHariIni)
//                 ->where('status_pembayaran', 'diterima')
//                 ->orderBy('no_antrean', 'desc')
//                 ->first();

//     $antreanSekarang = $last ? $last->no_antrean : 0;

//     return response()->json([
//         'antrean_sekarang' => $antreanSekarang
//     ]);
// }
public function selesaikan($id)
{
    try {
        $pesanan = Pemesanan::findOrFail($id);

        // Pastikan pembayaran sudah diterima
        if (strtolower($pesanan->status_pembayaran) !== 'diterima') {
            return response()->json([
                'message' => 'Pesanan belum dibayar atau belum dikonfirmasi.'
            ], 400);
        }

        // Perbarui status pengerjaan
        $pesanan->status_pengerjaan = 'selesai';
        $pesanan->save();

        return response()->json([
            'message' => 'Pesanan berhasil diselesaikan.'
        ]);
    } catch (\Exception $e) {
        Log::error('Gagal menyelesaikan pesanan', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'message' => 'Terjadi kesalahan saat menyelesaikan pesanan.',
            'error' => $e->getMessage()
        ], 500);
    }
}




}
