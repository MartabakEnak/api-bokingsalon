<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDataPesananController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', now()->format('Y-m'));

        // Validasi format bulan (misal: 2025-07)
        if (!preg_match('/^\d{4}-\d{2}$/', $bulan)) {
            $bulan = now()->format('Y-m');
        }

        $startDate = Carbon::parse($bulan . '-01')->startOfMonth();
        $endDate = Carbon::parse($bulan . '-01')->endOfMonth();

        // Data Pemesanan sesuai bulan
        $pemesanan = Pemesanan::with('layanan')
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->latest()
            ->get();


        // Status Jumlah (per bulan yang dipilih)
        $statusCounts = Pemesanan::select('status', DB::raw('count(*) as total'))
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->groupBy('status')
            ->pluck('total', 'status');

        // Pie Chart Layanan (per bulan yang dipilih)
        $layananCounts = DB::table('pemesanan_layanan')
            ->join('pemesanan', 'pemesanan.id', '=', 'pemesanan_layanan.pemesanan_id')
            ->join('layanan', 'layanan.id', '=', 'pemesanan_layanan.layanan_id')
            ->whereBetween('pemesanan.booking_date', [$startDate, $endDate])
            ->select('layanan.name', DB::raw('count(*) as total'))
            ->groupBy('layanan.name')
            ->pluck('total', 'layanan.name');

        $allMonths = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        // Ambil data pemesanan per bulan (pakai nomor bulan)
        $rawMonthlyCounts = Pemesanan::select(
            DB::raw("LPAD(MONTH(booking_date), 2, '0') as month_number"),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('booking_date', now()->year)
            ->groupBy(DB::raw("LPAD(MONTH(booking_date), 2, '0')"))
            ->orderBy(DB::raw("LPAD(MONTH(booking_date), 2, '0')"))
            ->pluck('total', 'month_number'); // hasilnya ['01' => 3, '07' => 10, dst]

        // Gabungkan ke dalam bentuk yang rapi dengan label bulan Indo
        $monthlyCounts = collect($allMonths)->mapWithKeys(function ($monthName, $monthNumber) use ($rawMonthlyCounts) {
            return [$monthName => $rawMonthlyCounts->get($monthNumber, 0)];
        });

        // Total pesanan pada hari tertentu di bulan yang dipilih
        $tanggalHariIni = Carbon::now()->toDateString();
        $totalPesananHariIni = Pemesanan::whereBetween('booking_date', [$startDate, $endDate])
            ->whereDate('booking_date', $tanggalHariIni)
            ->count();

        // Total pemesanan selama bulan yang dipilih
        $totalPesananBulanIni = Pemesanan::whereBetween('booking_date', [$startDate, $endDate])->count();

        // Total jenis layanan (tidak tergantung bulan)
        $jenisLayanan = DB::table('layanan')->count();

        return view('admin.dashboard', compact(
            'bulan',
            'pemesanan',
            'statusCounts',
            'layananCounts',
            'monthlyCounts',
            'totalPesananHariIni',
            'jenisLayanan',
            'totalPesananBulanIni'
        ));
    }



    public function update(Request $request, $id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);

            // Validasi hanya field yang dikirim
            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'phone_number' => 'sometimes|required|string|max:20',
                'booking_date' => 'sometimes|required|date',
                'booking_time' => 'sometimes|required',
                'status' => 'sometimes|required|in:pending,approved,rejected,paid',
            ]);

            // Hanya field yang divalidasi yang diupdate
            $pemesanan->fill($validated)->save();

            return response()->json([
                'success' => true,
                'message' => 'Data pemesanan berhasil diperbarui.',
                'data' => $pemesanan
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data pemesanan berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    public function cetak()
    {
        $pemesanan = Pemesanan::with('layanan')
            ->latest()
            ->get();

        return view('admin.cetak', compact('pemesanan'));
    }

    public function pemesanan(Request $request)
    {
        $bulan = $request->input('bulan', now()->format('Y-m'));
        // Validasi format bulan (misal: 2025-07)
        if (!preg_match('/^\d{4}-\d{2}$/', $bulan)) {
            $bulan = now()->format('Y-m');
        }

        $startDate = Carbon::parse($bulan . '-01')->startOfMonth();
        $endDate = Carbon::parse($bulan . '-01')->endOfMonth();

        // Data Pemesanan sesuai bulan
        $pemesanan = Pemesanan::with('layanan')
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->latest()
            ->get();

        return view('admin.data_pesanan', compact('bulan', 'pemesanan'));
    }
}
