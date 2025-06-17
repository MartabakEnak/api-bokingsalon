<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('snap_token')->nullable()->after('status_pembayaran');
            $table->string('status_pembayaran')->default('belum_bayar')->change();
        });
    }

    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn('snap_token');
            // Jika ingin mengembalikan ke nullable atau nilai sebelumnya, bisa disesuaikan.
        });
    }
};
