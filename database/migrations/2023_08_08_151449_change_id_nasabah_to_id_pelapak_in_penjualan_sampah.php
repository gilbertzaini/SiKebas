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
        Schema::table('penjualan_sampah', function (Blueprint $table) {
            $table->dropColumn('idNasabah');
            $table->string('idPelapak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjualan_sampah', function (Blueprint $table) {
            $table->dropColumn('idPelapak');
            $table->string('idNasabah');
        });
    }
};
