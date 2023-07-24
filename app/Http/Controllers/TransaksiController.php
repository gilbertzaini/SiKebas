<?php

namespace App\Http\Controllers;

use App\Models\PenjualanSampah;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function setoranNasabah(){
        $users = User::where('is_admin', 0)->get();
        $target = $users->first();
        $setoran = SetoranNasabah::where('idNasabah', $target->id)->get();
        return view('transaksi.setoranNasabah', ['users'=>$users, 'target'=>$target, 'setoran'=>$setoran]);
    }

    public function setoranNasabahById(request $request){
        $users = User::where('is_admin', 0)->get();
        $target = User::where('id', $request->idNasabah)->first();
        $setoran = SetoranNasabah::where('idNasabah', $request->idNasabah)->get();
        return view('transaksi.setoranNasabah', ['users'=>$users, 'target'=>$target, 'setoran'=>$setoran]);
    }

    public function tabunganNasabah(){
        $tabungan = TabunganNasabah::all();
        return view('transaksi.tabunganNasabah', ['tabungan'=>$tabungan]);        
    }

    public function transaksiPenjualanNasabah(){
        $nasabah = User::where('is_admin', 0)->get();
        $penjualan = PenjualanSampah::all();
        return view('transaksi.transaksiPenjualanNasabah', ['nasabah'=>$nasabah, 'penjualan'=>$penjualan]);        
    }
}
