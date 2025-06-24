<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
{
    Schema::table('pemesanan', function (Blueprint $table) {
        $table->enum('status_pengerjaan', ['belum', 'diproses', 'selesai'])->default('belum')->after('status_pembayaran');
    });
}

public function down(): void
{
    Schema::table('pemesanan', function (Blueprint $table) {
        $table->dropColumn('status_pengerjaan');
    });
}

};
