<?php

namespace App\Http\Controllers;

use App\Models\Pelapak;
use Illuminate\Http\Request;

class PelapakController extends Controller
{
    public function showAll(){
        $pelapak = Pelapak::all();
        return view('admin.daftarPelapak', ['pelapak' => $pelapak]);
    }

    function create(request $request){        
        return view("admin.pelapakBaru");
    }

    function store(request $request){

        // dd($request);
        $request->validate([
            'nama'=>'required|string',
            'alamat'=>'required|string',
            'noTelp'=>'required|numeric|min:10'
            // 'check'=>'required',
        ]);

        $pelapak = new Pelapak;
        $pelapak->nama = $request->nama;
        $pelapak->alamat = $request->alamat;
        $pelapak->no_telp = $request->noTelp;
        $pelapak->save();

        return redirect()->route('admin.daftarPelapak');
    }

    function edit(string $id){
        $pelapak = Pelapak::find($id);

        return view("admin.editPelapak", ['pelapak'=>$pelapak]);
    }

    function patch(request $request){
        $request->validate([
            'idPelapak'=>'required|string',
            'nama'=>'required|string',
            'alamat'=>'required|string',
            'noTelp'=>'required|string|min:10'
        ]);

        $pelapak = Pelapak::find($request->idPelapak);
        $pelapak->nama = $request->nama;
        $pelapak->alamat = $request->alamat;
        $pelapak->no_telp = $request->noTelp;
        $pelapak->save();

        return redirect()->route('admin.daftarPelapak');
    }

    function delete(string $id){
        Pelapak::find($id)->delete();

        return redirect()->route('admin.daftarPelapak');
    }
}
