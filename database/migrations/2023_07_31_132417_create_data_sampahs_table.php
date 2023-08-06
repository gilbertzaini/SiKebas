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
        Schema::create('data_sampahs', function (Blueprint $table) {
            $table->string('kodeSampah')->unique()->primary();
            $table->string('jenis');
            $table->string('nama');
            $table->integer('hargaLapak')->nullable();
            $table->integer('hargaNasabah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sampahs');
    }
};