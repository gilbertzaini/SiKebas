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
            $table->id();
            $table->string('kodeSampah')->unique();
            $table->string('jenis');
            $table->string('nama');
            $table->integer('hargaLapak')->nullable();
            $table->float('jumlah')->nullable();
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
