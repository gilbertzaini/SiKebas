<?php

namespace App\Http\Controllers;

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
        return view('laporan.laporanPembayaranKeLapak');        
    }
}
