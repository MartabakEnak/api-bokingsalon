<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run()
    {
        DB::table('layanan')->insert([
            ['nama' => 'Haircut', 'durasi' => 30, 'harga' => 50000],
            ['nama' => 'Facial', 'durasi' => 45, 'harga' => 75000],
            ['nama' => 'Manicure', 'durasi' => 40, 'harga' => 60000],
        ]);
    }
}
