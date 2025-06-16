<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Models\Layanan;

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

// Halaman admin manual (tanpa login) untuk testingRoute::get('/contacUs2', function () {return view('contacUs2'); });
Route::get('/aboutUs2', function () {return view('aboutUs2'); });
Route::get('/welcome2', function () {return view('welcome2'); });
Route::get('/riwayat2', function () {return view('riwayat2'); });
Route::get('/service2', function () {return view('service2'); });

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
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Auth Admin & Halaman Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Dashboard Admin dan aksi konfirmasi
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/konfirmasi/{id}', [AdminDashboardController::class, 'konfirmasi'])->name('admin.konfirmasi');
