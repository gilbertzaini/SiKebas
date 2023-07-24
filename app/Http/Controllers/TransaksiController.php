<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function setoranNasabah(){
        return view('transaksi.setoranNasabah');
    }

    public function tabunganNasabah(){
        return view('transaksi.tabunganNasabah');        
    }

    public function transaksiPenjualanNasabah(){
        return view('transaksi.transaksiPenjualanNasabah');        
    }
}
