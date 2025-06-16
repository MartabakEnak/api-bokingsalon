<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PemesananApiController;

Route::get('/pemesanan', [PemesananApiController::class, 'index']);



