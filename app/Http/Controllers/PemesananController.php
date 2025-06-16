<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\User;


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

        for ($i = 0; $i < 2; $i++) {
            if (!empty($request->tanggal[$i]) && !empty($request->jam[$i]) && !empty($request->layanan_id[$i])) {
                $saved[] = Pemesanan::create([
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

        return response()->json([
            'message' => 'Pemesanan berhasil disimpan!',
            'data' => $saved
        ], 201);
    }

<<<<<<< HEAD
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




=======
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
        $pemesanan->status_pembayaran = 'diterima';
        $pemesanan->save();

        return response()->json(['message' => 'Pemesanan dikonfirmasi.']);
    }

    public function userBookings()
    {
        $user = Auth::user();
        $pesanan = Pemesanan::where('user_id', $user->id)->with('layanan')->get();

        return response()->json($pesanan);
    }
>>>>>>> 1d3ce7a7e30c78f0ff25b72277b171db8c6c15ed
}
