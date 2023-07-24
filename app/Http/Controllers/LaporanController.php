<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\PembayaranLapak;
use App\Models\SetoranNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function kasNasabah(){
        return view('laporan.laporanArusKasNasabah');
    }

    public function nasabah(){
        $sampah = DataSampah::all();

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
                               ->groupBy('kodeSampah')
                               ->get();
    
        // Pass the data to the view
        return view('laporan.laporanNasabah', compact('sampah', 'summedSetoran'));
    }

    public function pembayaranLapak(){
        $records = PembayaranLapak::all();
        return view('laporan.laporanPembayaranKeLapak', ['records'=>$records]);        
    }
}
