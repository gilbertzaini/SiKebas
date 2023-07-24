<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function setoranNasabah(){
        $users = User::where('is_admin', 0)->get();
        $target = User::where('is_admin', 0)->first();
        // dd($target);
        return view('transaksi.setoranNasabah', ['users'=>$users, 'target'=>$target]);
    }

    public function setoranNasabahById(request $request){
        // dd($request);
        $users = User::where('is_admin', 0)->get();
        $target = User::where('id', $request->idNasabah)->first();
        // dd($target);
        return view('transaksi.setoranNasabah', ['users'=>$users, 'target'=>$target]);
    }

    public function tabunganNasabah(){
        return view('transaksi.tabunganNasabah');        
    }

    public function transaksiPenjualanNasabah(){
        return view('transaksi.transaksiPenjualanNasabah');        
    }
}
