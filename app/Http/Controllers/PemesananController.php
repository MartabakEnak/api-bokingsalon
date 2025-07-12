<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use App\Models\Layanan;
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


    public function cetak($id)
    {
        $pemesanan = Pemesanan::with(['layanan', 'user'])->findOrFail($id);
        return view('cetak', compact('pemesanan'));
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
            'name' => $request->name,
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

    public function userBookings()
    {
        $user = Auth::user();
        $pesanan = Pemesanan::where('user_id', $user->id)->with('layanan')->get();

        return response()->json($pesanan);
    }




    public function create()
    {
        $services = Layanan::all();
        $categories = KategoriLayanan::with('layanan')->get();
        return view('contacUs2', compact('services', 'categories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'phone_number' => 'required',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'layanan' => 'required|array|min:1',
            'layanan.*' => 'exists:layanan,id',
        ]);

        // Cek jika jam sudah dibooking
        $conflict = Pemesanan::where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->whereIn('status', ['pending', 'approved', 'paid'])
            ->exists();

        if ($conflict) {
            return back()->withErrors(['booking_time' => 'Jam ini sudah dibooking.']);
        }

        $selectedServices = Layanan::whereIn('id', $request->layanan)->get();
        $total = $selectedServices->sum('price');

        $booking = Pemesanan::create([
            'user_id' => $user->id ?? null,
            'name' => $user->name ?? null,
            'phone_number' => $request->phone_number,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        $booking->layanan()->attach($selectedServices->pluck('id'));

        return redirect()->route('pemesanan.riwayat')->with('success', 'Booking berhasil! Menunggu verifikasi admin.');
    }

    public function jamTerbooking(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $bookedTimes = Pemesanan::where('booking_date', $request->tanggal)
            ->whereIn('status', ['pending', 'approved', 'paid'])
            ->pluck('booking_time')
            ->map(function ($time) {
                return \Carbon\Carbon::parse($time)->format('H:i');
            });

        return response()->json($bookedTimes);
    }

    //riwayat
    public function riwayat()
    {
        $user = Auth::user();

        $pemesanan = Pemesanan::with('layanan')
            ->where('user_id', $user->id)
            ->latest()
            ->get();
        return view('riwayat2', compact('pemesanan'));
    }
}
