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
                'kodeSampah' => '1A',
                'jenis' => 'Metal',
                'nama' => 'Aluminium A',
                'hargaLapak' => 11000,
                'jumlah' => 0.1
            ],[
                'kodeSampah' => '1B',
                'jenis' => 'Metal',
                'nama' => 'Aluminium B / Panci',
                'hargaLapak' => 10000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '1C',
                'jenis' => 'Metal',
                'nama' => 'Besi',
                'hargaLapak' => 5000,
                'jumlah' => 6.1
            ],
            [
                'kodeSampah' => '1D',
                'jenis' => 'Metal',
                'nama' => 'Babet / Kran',
                'hargaLapak' => 6000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '1E',
                'jenis' => 'Metal',
                'nama' => 'Kaleng',
                'hargaLapak' => 2000,
                'jumlah' => 0.2
            ],
            [
                'kodeSampah' => '1F',
                'jenis' => 'Metal',
                'nama' => 'Kabel',
                'hargaLapak' => 1200,
                'jumlah' => 1
            ],
            [
                'kodeSampah' => '1G',
                'jenis' => 'Metal',
                'nama' => 'Kuningan',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '1H',
                'jenis' => 'Metal',
                'nama' => 'Kawat / Seng',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '1I',
                'jenis' => 'Metal',
                'nama' => 'Stainles',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '1J',
                'jenis' => 'Metal',
                'nama' => 'Tambaga',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2A',
                'jenis' => 'Plastik',
                'nama' => 'Asoy (Plastik Kresek)',
                'hargaLapak' => 4500,
                'jumlah' => 4.5
            ],
            [
                'kodeSampah' => '2B',
                'jenis' => 'Plastik',
                'nama' => 'Botol Putih (Botol Bersih)',
                'hargaLapak' => 4500,
                'jumlah' => 4.9
            ],
            [
                'kodeSampah' => '2C',
                'jenis' => 'Plastik',
                'nama' => 'Botol Kotor',
                'hargaLapak' => 2000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2D',
                'jenis' => 'Plastik',
                'nama' => 'Botol Warna(Bodong Warna)',
                'hargaLapak' => 1000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2E',
                'jenis' => 'Plastik',
                'nama' => 'Emberan',
                'hargaLapak' => 2700,
                'jumlah' => 10.1
            ],
            [
                'kodeSampah' => '2F',
                'jenis' => 'Plastik',
                'nama' => 'Ember Hitam',
                'hargaLapak' => 1000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2G',
                'jenis' => 'Plastik',
                'nama' => 'Gelas Mineral(Bersih)',
                'hargaLapak' => 6000,
                'jumlah' => 0.1
            ],
            [
                'kodeSampah' => '2H',
                'jenis' => 'Plastik',
                'nama' => 'Gelas Mineral(Kotor)',
                'hargaLapak' => 2000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2I',
                'jenis' => 'Plastik',
                'nama' => 'Gelas Montea(Warna)',
                'hargaLapak' => 1500,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2J',
                'jenis' => 'Plastik',
                'nama' => 'Kabin',
                'hargaLapak' => 2500,
                'jumlah' => 7
            ],
            [
                'kodeSampah' => '2K',
                'jenis' => 'Plastik',
                'nama' => 'PE (Plastik Putih)',
                'hargaLapak' => 800,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2L',
                'jenis' => 'Plastik',
                'nama' => 'PE Super',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2M',
                'jenis' => 'Plastik',
                'nama' => 'PPC(Paralon)',
                'hargaLapak' => 1500,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '2N',
                'jenis' => 'Plastik',
                'nama' => 'Tutup Botol',
                'hargaLapak' => 3000,
                'jumlah' => 0.1
            ],
            [
                'kodeSampah' => '2O',
                'jenis' => 'Plastik',
                'nama' => 'Tutup Galon/LD',
                'hargaLapak' => 4000,
                'jumlah' => 0.1
            ],
            [
                'kodeSampah' => '3A',
                'jenis' => 'Kertas',
                'nama' => 'Buku',
                'hargaLapak' => 1500,
                'jumlah' => 2.2
            ],
            [
                'kodeSampah' => '3B',
                'jenis' => 'Kertas',
                'nama' => 'Boncos/Duplek',
                'hargaLapak' => 1000,
                'jumlah' => 131
            ],
            [
                'kodeSampah' => '3C',
                'jenis' => 'Kertas',
                'nama' => 'Koran',
                'hargaLapak' => 4000,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '3D',
                'jenis' => 'Kertas',
                'nama' => 'Karton',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '3E',
                'jenis' => 'Kertas',
                'nama' => 'Kardus',
                'hargaLapak' => 2300,
                'jumlah' => 231
            ],
            [
                'kodeSampah' => '3F',
                'jenis' => 'Kertas',
                'nama' => 'Kardus Basah',
                'hargaLapak' => null,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '3G',
                'jenis' => 'Kertas',
                'nama' => 'Kantong Semen',
                'hargaLapak' => 1500,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '3H',
                'jenis' => 'Kertas',
                'nama' => 'Majalah',
                'hargaLapak' => 1200,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '3I',
                'jenis' => 'Kertas',
                'nama' => 'Putihan/HVS',
                'hargaLapak' => 2500,
                'jumlah' => 38.5
            ],
            [
                'kodeSampah' => '3J',
                'jenis' => 'Kertas',
                'nama' => 'LKS',
                'hargaLapak' => 1200,
                'jumlah' => null
            ],
            [
                'kodeSampah' => '4A',
                'jenis' => 'Beling/Kaca',
                'nama' => 'Botol Beling',
                'hargaLapak' => 300,
                'jumlah' => 4,
            ],
            [
                'kodeSampah' => '4B',
                'jenis' => 'Beling/Kaca',
                'nama' => 'Beling Pecah',
                'hargaLapak' => 300,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '4C',
                'jenis' => 'Beling/Kaca',
                'nama' => 'Botol Sirop',
                'hargaLapak' => 300,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '4D',
                'jenis' => 'Beling/Kaca',
                'nama' => 'Botol Kecap',
                'hargaLapak' => 400,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '4E',
                'jenis' => 'Beling/Kaca',
                'nama' => 'Botol Bir',
                'hargaLapak' => 800,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '5A',
                'jenis' => 'Akrilik',
                'nama' => 'Akrilik(Toples Tipis)',
                'hargaLapak' => 5000,
                'jumlah' => 1.3,
            ],
            [
                'kodeSampah' => '5B',
                'jenis' => 'Akrilik',
                'nama' => 'Keping CD',
                'hargaLapak' => 5000,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '5C',
                'jenis' => 'Akrilik',
                'nama' => 'Kristal',
                'hargaLapak' => 5000,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '6A',
                'jenis' => 'Fiber',
                'nama' => 'Impact',
                'hargaLapak' => 1000,
                'jumlah' => 2.3,
            ],[
                'kodeSampah' => '7A',
                'jenis' => 'Elektronik',
                'nama' => 'AC',
                'hargaLapak' => 150000,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '7B',
                'jenis' => 'Elektronik',
                'nama' => 'CD Player',
                'hargaLapak' => null,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '7C',
                'jenis' => 'Elektronik',
                'nama' => 'CPU',
                'hargaLapak' => 30000,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '7D',
                'jenis' => 'Elektronik',
                'nama' => 'HP',
                'hargaLapak' => null,
                'jumlah' => null,
            ],
            [
                'kodeSampah' => '7E',
                'jenis' => 'Elektronik',
                'nama' => 'Kulkas',
                'hargaLapak' => 60000,
                'jumlah' => null,
            ],
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
