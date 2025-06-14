<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananApiController extends Controller
{
    public function index()
    {
        $data = Pemesanan::all();
        return response()->json($data);
    }
}

