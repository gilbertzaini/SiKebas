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
        Schema::table('setoran_nasabah', function (Blueprint $table) {
            $table->dropColumn('hargaNasabah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setoran_nasabah', function (Blueprint $table) {
            $table->integer('hargaNasabah');
        });
    }
};
