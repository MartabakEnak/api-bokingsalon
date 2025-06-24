<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        $response = Http::withHeaders([
            'Authorization' => env('WABLAS_API_KEY'),
        ])->post('https://kudus.wablas.com/api/send-message', [
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dikirim',
                'response' => $response->json(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengirim pesan',
            'error' => $response->body(),
        ], 500);
    }
}
