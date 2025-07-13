<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('layanan')->insert([
            ['name' => 'Sulam Alis Shading', 'price' => 600000, 'duration' => 45, 'kategori_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sulam Alis Natural', 'price' => 500000, 'duration' => 50, 'kategori_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sulam Alis Ombre', 'price' => 650000, 'duration' => 50, 'kategori_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sulam Alis 6D', 'price' => 700000, 'duration' => 45, 'kategori_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Touch Up Sulam Alis', 'price' => 300000, 'duration' => 55, 'kategori_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Simple haircut', 'price' => 70000, 'duration' => 10, 'kategori_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hair Styling', 'price' => 90000, 'duration' => 15, 'kategori_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Full hair color', 'price' => 250000, 'duration' => 40, 'kategori_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Protein treatment', 'price' => 200000, 'duration' => 30, 'kategori_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hair mask', 'price' => 150000, 'duration' => 55, 'kategori_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Manicure', 'price' => 80000, 'duration' => 30, 'kategori_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pedicure', 'price' => 90000, 'duration' => 30, 'kategori_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nail Art', 'price' => 120000, 'duration' => 30, 'kategori_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gel Polish', 'price' => 100000, 'duration' => 40, 'kategori_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nail Spa', 'price' => 110000, 'duration' => 20, 'kategori_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias Wisuda', 'price' => 200000, 'duration' => 55, 'kategori_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias Pesta', 'price' => 250000, 'duration' => 55, 'kategori_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias Pengantin', 'price' => 500000, 'duration' => 55, 'kategori_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias Foto', 'price' => 300000, 'duration' => 40, 'kategori_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rias Keluarga', 'price' => 150000, 'duration' => 50, 'kategori_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Full Body Massage', 'price' => 150000, 'duration' => 30, 'kategori_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Reflexology', 'price' => 100000, 'duration' => 30, 'kategori_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Back Massage', 'price' => 90000, 'duration' => 45, 'kategori_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Head Massage', 'price' => 80000, 'duration' => 35, 'kategori_id' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Totok Wajah', 'price' => 70000, 'duration' => 45, 'kategori_id' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
