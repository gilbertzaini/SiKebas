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
        Schema::create('setoran_nasabah', function (Blueprint $table) {
            $table->string('kodeTransaksi')->unique()->primary();
            $table->string('kodeSampah');
            $table->string('idNasabah');
            $table->string('idPengurus');
            $table->integer('hargaNasabah');
            $table->float('berat');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setoran_nasabah');
    }
};
