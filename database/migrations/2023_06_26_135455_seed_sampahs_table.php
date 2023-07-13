<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('sampahs')->insert([
            [
                'jenis' => 'PP Air Mineral Gelas',
                'harga' => 5500,
            ],
            [
                'jenis' => 'PP Ember Warna',
                'harga' => 2500,
            ],
            [
                'jenis' => 'Tutup Botol',
                'harga' => 3700,
            ],
            [
                'jenis' => 'PP Ember Hitam',
                'harga' => 1000,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sampahs', function (Blueprint $table) {

            DB::table('sampahs')->truncate();
        });
    }
};
