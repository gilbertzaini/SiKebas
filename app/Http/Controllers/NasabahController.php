<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Saldo;
use App\Models\User;
use App\Exports\NasabahExport;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class NasabahController extends Controller
{
    function showAll() {
        $nasabah = Nasabah::all();
        return view('admin.daftarNasabah', ['nasabah'=>$nasabah]);
    }

    function show(string $id){
        $nasabah = Nasabah::find($id);
        
        $setoran = SetoranNasabah::where('idNasabah', $id)->get();
        $penarikan = TabunganNasabah::where('idNasabah', $id)->where('kategori', 'Kredit')->get();

        return view('admin.detailNasabah', ['nasabah'=>$nasabah, 'setoran'=>$setoran, 'penarikan'=>$penarikan]);
    }

    function search(request $request){
        $request->validate([
            'param'=>'required|string'
        ]);

        return redirect()->route('admin.filteredNasabah', ['param'=>$request->param]);
    }

    function filtered(string $param){
        $pengurus = Nasabah::where('name', 'like', '%' . $param . '%')
                        ->get();

        return view('admin.daftarNasabah', ['nasabah'=>$pengurus]);
    }

    function create(){
        return view('admin.nasabahBaru');
    }

    function store(request $request){
        $request->validate([
            'name'=>'required|string',
            'telp'=>'required|string|min:10',
            'alamat'=>'required|string',
        ]);

        $nasabah = new Nasabah;
        $nasabah->name = $request->name;
        $nasabah->no_telp = $request->telp;
        $nasabah->alamat = $request->alamat;
        $nasabah->saldo = 0;
        $nasabah->save();

        return redirect()->route('admin.daftarNasabah');
    }

    function edit(string $id){
        $nasabah = Nasabah::find($id);

        return view('admin.editNasabah', ['nasabah'=>$nasabah]);
    }

    function patch(request $request){
        // dd($request);

        $request->validate([
            'idNasabah'=>'required',
            'name'=>'required|string',
            'telp'=>'required|string|min:10',
            'alamat'=>'required|string',
            'saldo' => 'required|numeric'
        ]);

        $nasabah = Nasabah::find($request->idNasabah);
        $nasabah->name = $request->name;
        $nasabah->no_telp = $request->telp;
        $nasabah->alamat = $request->alamat;
        $nasabah->saldo = $request->saldo;
        $nasabah->save();

        return redirect()->route('admin.daftarNasabah');
    }

    function delete(string $id){
        // Saldo::where('user_id', $id)->delete();
        Nasabah::find($id)->delete();

        return redirect()->route('admin.daftarNasabah');
    }

    function export(){
        return Excel::download(new NasabahExport, 'Nasabah.xlsx');
    }
}
