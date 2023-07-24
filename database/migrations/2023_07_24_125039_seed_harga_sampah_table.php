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
        DB::table('harga_sampah')->insert([
            [
                'nama' => 'Aki',
                'hargaLapak' => '10000',
                'hargaNasabah' => '9000',
            ],
            [
                'nama' => 'Alumunium',
                'hargaLapak' => '11000',
                'hargaNasabah' => '10000',
            ],
            [
                'nama' => 'Asoy/kantong kresek',
                'hargaLapak' => '250',
                'hargaNasabah' => '200',
            ],
            [
                'nama' => 'Babet/kran air',
                'hargaLapak' => '5000',
                'hargaNasabah' => '4500',
            ],
            [
                'nama' => 'beling',
                'hargaLapak' => '250',
                'hargaNasabah' => '200',
            ],
            [
                'nama' => 'Besi',
                'hargaLapak' => '5000',
                'hargaNasabah' => '4500',
            ],
            [
                'nama' => 'Botol Bersih',
                'hargaLapak' => '5000',
                'hargaNasabah' => '4500',
            ],
            [
                'nama' => 'Botol Warna',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'Boncos/bungkus rokok',
                'hargaLapak' => '700',
                'hargaNasabah' => '500',
            ],
            [
                'nama' => 'Buku tulis/pelajaran/blom dikupas',
                'hargaLapak' => '1300',
                'hargaNasabah' => '100',
            ],
            [
                'nama' => 'Botol sirop',
                'hargaLapak' => '300',
                'hargaNasabah' => '300',
            ],
            [
                'nama' => 'Botol kecap /botol',
                'hargaLapak' => '400',
                'hargaNasabah' => '350',
            ],
            [
                'nama' => 'botol bir / botol',
                'hargaLapak' => '800',
                'hargaNasabah' => '700',
            ],
            [
                'nama' => 'Ember campur',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'Ember hitam /pot bunga',
                'hargaLapak' => '1000',
                'hargaNasabah' => '800',
            ],
            [
                'nama' => 'Gelas bersih',
                'hargaLapak' => '4500',
                'hargaNasabah' => '4000',
            ],
            [
                'nama' => 'Gelas kotor',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'HVS/Putihan',
                'hargaLapak' => '2700',
                'hargaNasabah' => '2500',
            ],
            [
                'nama' => 'Impact /Kaset tape, tv',
                'hargaLapak' => '800',
                'hargaNasabah' => '500',
            ],
            [
                'nama' => 'Kabin/paku/besi kerompong/Stenlis/baja ringan',
                'hargaLapak' => '3000',
                'hargaNasabah' => '2500',
            ],
            [
                'nama' => 'kaleng',
                'hargaLapak' => '2500',
                'hargaNasabah' => '2000',
            ],
            [
                'nama' => 'Kardus',
                'hargaLapak' => '1600',
                'hargaNasabah' => '1400',
            ],
            [
                'nama' => 'Kaet/talang',
                'hargaLapak' => '600',
                'hargaNasabah' => '500',
            ],
            [
                'nama' => 'Keping cd/acrylic/kristal',
                'hargaLapak' => '5000',
                'hargaNasabah' => '4500',
            ],
            [
                'nama' => 'Koran',
                'hargaLapak' => '4000',
                'hargaNasabah' => '3500',
            ],
            [
                'nama' => 'Kuningan',
                'hargaLapak' => '45000',
                'hargaNasabah' => '40000',
            ],
            [
                'nama' => 'Kabel/selang air/paralon',
                'hargaLapak' => '1500',
                'hargaNasabah' => '1000',
            ],
            [
                'nama' => 'Majalah',
                'hargaLapak' => '1000',
                'hargaNasabah' => '700',
            ],
            [
                'nama' => 'PE/Plastik bening',
                'hargaLapak' => '800',
                'hargaNasabah' => '600',
            ],[
                'nama' => 'Seng/kawat',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'Tembaga',
                'hargaLapak' => '85000',
                'hargaNasabah' => '80000',
            ],
            [
                'nama' => 'Harga tanpa pilah',
                'hargaLapak' => '1200',
                'hargaNasabah' => '1000',
            ],
            [
                'nama' => 'Karüng goni',
                'hargaLapak' => '500',
                'hargaNasabah' => '400',
            ],
            [
                'nama' => 'Kaset tape',
                'hargaLapak' => '4000',
                'hargaNasabah' => '3500',
            ],
            [
                'nama' => 'LD (Tutup galon)',
                'hargaLapak' => '4500',
                'hargaNasabah' => '4000',
            ],
            [
                'nama' => 'Tutup Botol (Aqua & minuman)',
                'hargaLapak' => '3000',
                'hargaNasabah' => '2500',
            ],
            [
                'nama' => 'Sepatu/sendal lentur/boat/carvil',
                'hargaLapak' => '700',
                'hargaNasabah' => '500',
            ],
            [
                'nama' => 'Tv',
                'hargaLapak' => '20000',
                'hargaNasabah' => '15000',
            ],
            [
                'nama' => 'Monitor + PC Komputer',
                'hargaLapak' => '60000',
                'hargaNasabah' => '55000',
            ],
            [
                'nama' => 'Kantong Semen',
                'hargaLapak' => '1500',
                'hargaNasabah' => '1200',
            ],
            [
                'nama' => 'LKS',
                'hargaLapak' => '1200',
                'hargaNasabah' => '1000',
            ],
            [
                'nama' => 'Panci / Alumunium',
                'hargaLapak' => '10000',
                'hargaNasabah' => '9500',
            ],
            [
                'nama' => 'Mesin Cuci',
                'hargaLapak' => '50000',
                'hargaNasabah' => '45000',
            ],[
                'nama' => 'Kulkas',
                'hargaLapak' => '60000',
                'hargaNasabah' => '55000',
            ],
            [
                'nama' => 'AC',
                'hargaLapak' => '150000',
                'hargaNasabah' => '145000',
            ],
            [
                'nama' => 'Minyak jelantah',
                'hargaLapak' => '7500',
                'hargaNasabah' => '6500',
            ],
            [
                'nama' => 'GALON AQUA',
                'hargaLapak' => '3000',
                'hargaNasabah' => '2500',
            ],
            [
                'nama' => 'Botol Kotor',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'Galon Le Minerale',
                'hargaLapak' => '2000',
                'hargaNasabah' => '1500',
            ],
            [
                'nama' => 'PC',
                'hargaLapak' => '30000',
                'hargaNasabah' => '27500',
            ],
            [
                'nama' => 'Monitor',
                'hargaLapak' => '30000',
                'hargaNasabah' => '25000',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('harga_sampah', function (Blueprint $table) {

            DB::table('harga_sampah')->truncate();
        });
    }
};
