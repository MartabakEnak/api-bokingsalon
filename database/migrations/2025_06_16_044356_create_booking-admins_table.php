<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('phone');
        $table->date('date');
        $table->time('time');
        $table->string('service');
        $table->enum('payment_status', ['Menunggu', 'Dikonfirmasi'])->default('Menunggu');
        $table->timestamps();
    });
}

};
