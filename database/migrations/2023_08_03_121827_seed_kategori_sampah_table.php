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
        DB::table('kategori_sampah')->insert([
            [
                "kategori" => "Metal",
            ],
            [
                "kategori" => "Plastik",
            ],
            [
                "kategori" => "Kertas",
            ],
            [
                "kategori" => "Beling/Kaca",
            ],
            [
                "kategori" => "Akrilik",
            ],
            [
                "kategori" => "Fiber",
            ],
            [
                "kategori" => "Elektronik",
            ],
            [
                "kategori" => "Minyak",
            ],
            [
                "kategori" => "Kain",
            ],
            [
                "kategori" => "Karet",
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategori_sampah', function (Blueprint $table) {
            DB::table('kategori_sampah')->truncate();
        });
    }
};
