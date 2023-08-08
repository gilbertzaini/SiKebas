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
        Schema::create('penjualan_sampah', function (Blueprint $table) {
            $table->string('kodeTransaksi')->unique()->primary();
            $table->string('idNasabah');
            $table->string('kodeSampah');
            $table->integer('hargaLapak');
            $table->float('jumlah');            
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_sampah');
    }
};
