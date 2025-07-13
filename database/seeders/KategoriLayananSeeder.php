<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriLayananSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('kategori_layanan')->insert([
            ['name' => 'sulam', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'hair styling', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nail Care', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Massage', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
