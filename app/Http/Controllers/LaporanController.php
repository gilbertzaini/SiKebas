<?php

namespace App\Http\Controllers;

use App\Models\PembayaranLapak;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function kasNasabah(){
        return view('laporan.laporanArusKasNasabah');
    }

    public function nasabah(){
        return view('laporan.laporanNasabah');        
    }

    public function pembayaranLapak(){
        $records = PembayaranLapak::all();
        return view('laporan.laporanPembayaranKeLapak', ['records'=>$records]);        
    }
}
