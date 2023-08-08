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
        Schema::create('tabungan_nasabah', function (Blueprint $table) {
            $table->string('kodeTransaksi')->unique()->primary();
            $table->string('idNasabah');
            $table->integer('jumlah');
            $table->string('kategori');
            $table->string('keterangan')->default('Penarikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabungan_nasabah');
    }
};
