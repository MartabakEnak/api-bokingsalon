<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PembayaranController;
use App\Models\Layanan;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\AdminDataPesananController;
/*
|--------------------------------------------------------------------------
| Halaman Umum (tanpa login)
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');
Route::view('/welcome', 'welcome');
Route::view('/contacUs', 'contacUs');
Route::view('/aboutUs', 'aboutUs');
Route::view('/riwayat', 'riwayat');
Route::view('/service', 'service');


Route::get('/contacUs2', function () {
    return view('contacUs2');
});
Route::get('/aboutUs2', function () {
    return view('aboutUs2');
});
Route::get('/welcome2', function () {
    return view('welcome2');
});
Route::get('/riwayat2', function () {
    return view('riwayat2');
});
Route::get('/service2', function () {
    return view('service2');
});

Route::get('/welcome2', function () {
    return view('welcome2');
})->name('welcome2');


// Halaman admin manual (tanpa login) untuk testing
Route::get('/admin', [OrderController::class, 'index'])->name('admin');

/*
|--------------------------------------------------------------------------
| Pemesanan oleh user (tanpa login)
|--------------------------------------------------------------------------
*/

Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');

/*
|--------------------------------------------------------------------------
| API Endpoint untuk fetch dari JavaScript (Dashboard Admin)
|--------------------------------------------------------------------------
*/

Route::get('/api/bookings', [PemesananController::class, 'index'])->name('api.bookings');
Route::get('/api/bookings/{id}', [PemesananController::class, 'show'])->name('api.bookings.show');
Route::put('/api/bookings/{id}', [PemesananController::class, 'update'])->name('api.bookings.update');
Route::delete('/api/bookings/{id}', [PemesananController::class, 'destroy'])->name('api.bookings.destroy');

// API untuk data layanan (digunakan di form booking/edit)
Route::get('/api/layanan', function () {
    return response()->json(Layanan::all());
})->name('api.layanan');

/*
|--------------------------------------------------------------------------
| Auth untuk user (login, register, dashboard)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth default dari Laravel Breeze
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Auth Admin & Halaman Admin Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:admin'])->group(function () {

    Route::get('admin/pesanan/cetak', [AdminDataPesananController::class, 'cetak'])->name('admin.cetak');
    Route::delete('admin/pesanan/{id}', [AdminDataPesananController::class, 'destroy'])->name('admin.pesanan.destroy');
});
Route::put('admin/pesanan/{id}', [AdminDataPesananController::class, 'update'])->name('admin.pesanan.update');
Route::get('admin/dashboard', [AdminDataPesananController::class, 'index'])->name('admin.dashboard');

Route::get('admin/pesanan', [AdminDataPesananController::class, 'pemesanan'])->name('admin.pesanan');
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');



Route::get('/data-pesanan', [AdminDataPesananController::class, 'index'])
    ->name('admin.data_pesanan');


Route::get('/pembayaran/{id}', [PemesananController::class, 'tampilkanQR'])->name('pembayaran.qr');
Route::get('/riwayat', [PemesananController::class, 'riwayat'])->middleware('auth');
Route::get('/riwayat', [PemesananController::class, 'riwayat']);




Route::get('/verify-otp', [OtpController::class, 'show'])->name('otp.verify.page');
Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');


// Pesan layanan terbaru
Route::middleware('auth')->group(function () {
    Route::get('/pemesanan', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

    // routes/web.php atau routes/api.php
    Route::get('/api/jam-terbooking', [App\Http\Controllers\PemesananController::class, 'jamTerbooking']);

    //riwayat
    Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
    Route::get('/riwayat/cetak/{id}', [PemesananController::class, 'cetak'])->name('riwayat.cetak');

    Route::get('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
});
