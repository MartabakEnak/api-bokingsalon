<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function show()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6',
    ]);

    // Cari data berdasarkan kode OTP yang valid dan belum kedaluwarsa
    $record = DB::table('otps')
        ->where('otp', $request->otp)
        ->where('expires_at', '>', now())
        ->first();

    if ($record) {
        // Hapus OTP dari database agar tidak bisa digunakan lagi
        DB::table('otps')->where('id', $record->id)->delete();

        return redirect()->route('login')->with('status', 'Verifikasi berhasil! Silakan login.');
    }

    return back()->withErrors(['otp' => 'Kode OTP tidak valid atau telah kedaluwarsa.']);
}

}
