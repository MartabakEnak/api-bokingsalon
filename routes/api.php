<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Models\Layanan;

// Endpoint API untuk bookings
Route::get('/bookings', [PemesananController::class, 'index']);
Route::post('/bookings', [PemesananController::class, 'store']);
Route::get('/bookings/{id}', [PemesananController::class, 'show']);
Route::put('/bookings/{id}', [PemesananController::class, 'update']);
Route::delete('/bookings/{id}', [PemesananController::class, 'destroy']);

// Endpoint API untuk layanan
Route::get('/layanan', function () {
    return response()->json(Layanan::all());
});


