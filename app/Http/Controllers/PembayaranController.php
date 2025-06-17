<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function bayar($id)
    {


        $pesanan = Pemesanan::with('layanan')->findOrFail($id);

        // Midtrans config
        Config::$serverKey = config('midtrans.serverKey');
Config::$clientKey = config('midtrans.clientKey');
Config::$isProduction = config('midtrans.isProduction');
Config::$isSanitized = true;
Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id . '-' . uniqid(),
                'gross_amount' => $pesanan->layanan->harga,
            ],
            'customer_details' => [
                'first_name' => $pesanan->nama_pelanggan,
                'email' => Auth::user()->email ?? 'guest@example.com',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
        $pesanan->update(['snap_token' => $snapToken]);

        return view('pembayaran.bayar', compact('pesanan', 'snapToken'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $signatureKey = $request->signature_key;
        $expectedSignature = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $orderId = explode('-', $request->order_id)[0];
        $pemesanan = Pemesanan::findOrFail($orderId);

        if ($request->transaction_status == 'settlement') {
            $pemesanan->update(['status_pembayaran' => 'sukses']);
        } elseif ($request->transaction_status == 'pending') {
            $pemesanan->update(['status_pembayaran' => 'pending']);
        } else {
            $pemesanan->update(['status_pembayaran' => 'gagal']);
        }

        return response()->json(['message' => 'Callback received']);
    }
}
