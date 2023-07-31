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
        DB::table('data_sampahs')->insert([
            [
                "kodeSampah" => "1A",
                "jenis" => "Metal",
                "nama" => "Aluminium A",
                "hargaLapak" => 11000,
                "hargaNasabah" => 10000
            ],
            [
                "kodeSampah" => "1B",
                "jenis" => "Metal",
                "nama" => "Aluminium B / Panci",
                "hargaLapak" => 10000,
                "hargaNasabah" => 8500
            ],
            [
                "kodeSampah" => "1C",
                "jenis" => "Metal",
                "nama" => "Besi",
                "hargaLapak" => 5000,
                "hargaNasabah" => 4500
            ],
            [
                "kodeSampah" => "1D",
                "jenis" => "Metal",
                "nama" => "Babet / Kran",
                "hargaLapak" => 6000,
                "hargaNasabah" => 5000
            ],
            [
                "kodeSampah" => "1E",
                "jenis" => "Metal",
                "nama" => "Kaleng",
                "hargaLapak" => 2500,
                "hargaNasabah" => 2000
            ],
            [
                "kodeSampah" => "1F",
                "jenis" => "Metal",
                "nama" => "Kabel",
                "hargaLapak" => 1500,
                "hargaNasabah" => 1000
            ],
            [
                "kodeSampah" => "1G",
                "jenis" => "Metal",
                "nama" => "Kuningan",
                "hargaLapak" => 45000,
                "hargaNasabah" => 40000
            ],
            [
                "kodeSampah" => "1H",
                "jenis" => "Metal",
                "nama" => "Kawat / Seng",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "1I",
                "jenis" => "Metal",
                "nama" => "Stainless",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "1J",
                "jenis" => "Metal",
                "nama" => "Tembaga",
                "hargaLapak" => 85000,
                "hargaNasabah" => 80000
            ],
            [
                "kodeSampah" => "1K",
                "jenis" => "Metal",
                "nama" => "Seng",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "1L",
                "jenis" => "Metal",
                "nama" => "Kawat",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "1M",
                "jenis" => "Metal",
                "nama" => "Paku",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "1N",
                "jenis" => "Metal",
                "nama" => "Besi Kerompong",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "1O",
                "jenis" => "Metal",
                "nama" => "Baja Ringan",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "2A",
                "jenis" => "Plastik",
                "nama" => "Asoy (Plastik Kresek)",
                "hargaLapak" => 250,
                "hargaNasabah" => 200
            ],
            [
                "kodeSampah" => "2B",
                "jenis" => "Plastik",
                "nama" => "Botol Putih (Botol Bersih)",
                "hargaLapak" => 5000,
                "hargaNasabah" => 4500
            ],
            [
                "kodeSampah" => "2C",
                "jenis" => "Plastik",
                "nama" => "Botol Kotor",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "2D",
                "jenis" => "Plastik",
                "nama" => "Botol Warna(Bodong Warna)",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "2E",
                "jenis" => "Plastik",
                "nama" => "Ember Campur",
                "hargaLapak" => 2700,
                "hargaNasabah" => 2000
            ],
            [
                "kodeSampah" => "2F",
                "jenis" => "Plastik",
                "nama" => "Ember Hitam",
                "hargaLapak" => 1000,
                "hargaNasabah" => 800
            ],
            [
                "kodeSampah" => "2G",
                "jenis" => "Plastik",
                "nama" => "Gelas Mineral(Bersih)",
                "hargaLapak" => 6000,
                "hargaNasabah" => 5000
            ],
            [
                "kodeSampah" => "2H",
                "jenis" => "Plastik",
                "nama" => "Gelas Mineral(Kotor)",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "2I",
                "jenis" => "Plastik",
                "nama" => "Gelas Montea(Warna)",
                "hargaLapak" => 1500,
                "hargaNasabah" => 1200
            ],
            [
                "kodeSampah" => "2J",
                "jenis" => "Plastik",
                "nama" => "Kabin",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "2K",
                "jenis" => "Plastik",
                "nama" => "PE (Plastik Putih)",
                "hargaLapak" => 800,
                "hargaNasabah" => 600
            ],
            [
                "kodeSampah" => "2L",
                "jenis" => "Plastik",
                "nama" => "PE Super",
                "hargaLapak" => 900,
                "hargaNasabah" => 700
            ],
            [
                "kodeSampah" => "2M",
                "jenis" => "Plastik",
                "nama" => "PPC(Paralon)",
                "hargaLapak" => 1500,
                "hargaNasabah" => 1000
            ],
            [
                "kodeSampah" => "2N",
                "jenis" => "Plastik",
                "nama" => "Tutup Botol",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "2O",
                "jenis" => "Plastik",
                "nama" => "Tutup Galon/LD",
                "hargaLapak" => 4500,
                "hargaNasabah" => 4000
            ],
            [
                "kodeSampah" => "2P",
                "jenis" => "Plastik",
                "nama" => "Talang",
                "hargaLapak" => 600,
                "hargaNasabah" => 500
            ],
            [
                "kodeSampah" => "2Q",
                "jenis" => "Plastik",
                "nama" => "Selang Air",
                "hargaLapak" => 1500,
                "hargaNasabah" => 1000
            ],
            [
                "kodeSampah" => "2R",
                "jenis" => "Plastik",
                "nama" => "GALON AQUA",
                "hargaLapak" => 3000,
                "hargaNasabah" => 2500
            ],
            [
                "kodeSampah" => "2S",
                "jenis" => "Plastik",
                "nama" => "Galon Le Minerale",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "2T",
                "jenis" => "Plastik",
                "nama" => "Kaset Tape",
                "hargaLapak" => 4000,
                "hargaNasabah" => 3500
            ],
            [
                "kodeSampah" => "3A",
                "jenis" => "Kertas",
                "nama" => "Buku",
                "hargaLapak" => 1500,
                "hargaNasabah" => 200
            ],
            [
                "kodeSampah" => "3B",
                "jenis" => "Kertas",
                "nama" => "Boncos/Duplek",
                "hargaLapak" => 1000,
                "hargaNasabah" => 700
            ],
            [
                "kodeSampah" => "3C",
                "jenis" => "Kertas",
                "nama" => "Koran",
                "hargaLapak" => 4000,
                "hargaNasabah" => 3500
            ],
            [
                "kodeSampah" => "3D",
                "jenis" => "Kertas",
                "nama" => "Karton",
                "hargaLapak" => 2300,
                "hargaNasabah" => 2000
            ],
            [
                "kodeSampah" => "3E",
                "jenis" => "Kertas",
                "nama" => "Kardus",
                "hargaLapak" => 2300,
                "hargaNasabah" => 2000
            ],
            [
                "kodeSampah" => "3F",
                "jenis" => "Kertas",
                "nama" => "Kardus Basah",
                "hargaLapak" => 1600,
                "hargaNasabah" => 1400
            ],
            [
                "kodeSampah" => "3G",
                "jenis" => "Kertas",
                "nama" => "Kantong Semen",
                "hargaLapak" => 1500,
                "hargaNasabah" => 1200
            ],
            [
                "kodeSampah" => "3H",
                "jenis" => "Kertas",
                "nama" => "Majalah",
                "hargaLapak" => 1200,
                "hargaNasabah" => 800
            ],
            [
                "kodeSampah" => "3I",
                "jenis" => "Kertas",
                "nama" => "Putihan/HVS",
                "hargaLapak" => 2500,
                "hargaNasabah" => 2300
            ],
            [
                "kodeSampah" => "3J",
                "jenis" => "Kertas",
                "nama" => "LKS",
                "hargaLapak" => 1200,
                "hargaNasabah" => 1000
            ],
            [
                "kodeSampah" => "4A",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Beling",
                "hargaLapak" => 300,
                "hargaNasabah" => 250
            ],
            [
                "kodeSampah" => "4B",
                "jenis" => "Beling/Kaca",
                "nama" => "Beling Pecah",
                "hargaLapak" => 250,
                "hargaNasabah" => 200
            ],
            [
                "kodeSampah" => "4C",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Sirop",
                "hargaLapak" => 300,
                "hargaNasabah" => 300
            ],
            [
                "kodeSampah" => "4D",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Kecap",
                "hargaLapak" => 400,
                "hargaNasabah" => 350
            ],
            [
                "kodeSampah" => "4E",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Bir",
                "hargaLapak" => 800,
                "hargaNasabah" => 700
            ],
            [
                "kodeSampah" => "4F",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Bersih",
                "hargaLapak" => 5000,
                "hargaNasabah" => 4500
            ],
            [
                "kodeSampah" => "4G",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Kotor",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "4H",
                "jenis" => "Beling/Kaca",
                "nama" => "Botol Warna",
                "hargaLapak" => 2000,
                "hargaNasabah" => 1500
            ],
            [
                "kodeSampah" => "5A",
                "jenis" => "Akrilik",
                "nama" => "Akrilik(Toples Tipis)",
                "hargaLapak" => 5000,
                "hargaNasabah" => 4500
            ],
            [
                "kodeSampah" => "5B",
                "jenis" => "Akrilik",
                "nama" => "Keping CD",
                "hargaLapak" => 5000,
                "hargaNasabah" => 4500
            ],
            [
                "kodeSampah" => "6A",
                "jenis" => "Fiber",
                "nama" => "Impact",
                "hargaLapak" => 1000,
                "hargaNasabah" => 500
            ],
            [
                "kodeSampah" => "7A",
                "jenis" => "Elektronik",
                "nama" => "AC",
                "hargaLapak" => 150000,
                "hargaNasabah" => 145000
            ],
            [
                "kodeSampah" => "7B",
                "jenis" => "Elektronik",
                "nama" => "CD Player",
                "hargaLapak" => 40000,
                "hargaNasabah" => 35000
            ],
            [
                "kodeSampah" => "7C",
                "jenis" => "Elektronik",
                "nama" => "CPU",
                "hargaLapak" => 60000,
                "hargaNasabah" => 9000
            ],
            [
                "kodeSampah" => "7D",
                "jenis" => "Elektronik",
                "nama" => "HP",
                "hargaLapak" => 10000,
                "hargaNasabah" => 27500
            ],
            [
                "kodeSampah" => "7E",
                "jenis" => "Elektronik",
                "nama" => "Kulkas",
                "hargaLapak" => 30000,
                "hargaNasabah" => 25000
            ],
            [
                "kodeSampah" => "7F",
                "jenis" => "Elektronik",
                "nama" => "Aki",
                "hargaLapak" => 10000,
                "hargaNasabah" => 9000
            ],
            [
                "kodeSampah" => "7G",
                "jenis" => "Elektronik",
                "nama" => "PC",
                "hargaLapak" => 30000,
                "hargaNasabah" => 27500
            ],
            [
                "kodeSampah" => "7H",
                "jenis" => "Elektronik",
                "nama" => "Monitor",
                "hargaLapak" => 30000,
                "hargaNasabah" => 25000
            ],
            [
                "kodeSampah" => "7I",
                "jenis" => "Elektronik",
                "nama" => "Mesin Cuci",
                "hargaLapak" => 50000,
                "hargaNasabah" => 55000
            ],
            [
                "kodeSampah" => "7J",
                "jenis" => "Elektronik",
                "nama" => "Kulkas",
                "hargaLapak" => 60000,
                "hargaNasabah" => 50000
            ],
            [
                "kodeSampah" => "7K",
                "jenis" => "Elektronik",
                "nama" => "TV",
                "hargaLapak" => 20000,
                "hargaNasabah" => 15000
            ],
            [
                "kodeSampah" => "8A",
                "jenis" => "Minyak",
                "nama" => "Minyak jelantah",
                "hargaLapak" => 7500,
                "hargaNasabah" => 6500
            ],
            [
                "kodeSampah" => "9A",
                "jenis" => "Kain",
                "nama" => "Karung Goni",
                "hargaLapak" => 500,
                "hargaNasabah" => 400
            ],
            [
                "kodeSampah" => "10A",
                "jenis" => "Karet",
                "nama" => "Sendal Lentur",
                "hargaLapak" => 700,
                "hargaNasabah" => 500
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_sampahs', function (Blueprint $table) {
            DB::table('data_sampahs')->truncate();
        });
    }
};
