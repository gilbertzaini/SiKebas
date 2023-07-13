<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use App\Exports\NasabahExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class NasabahController extends Controller
{
    function showAll() {
        $nasabah = User::where('is_admin', 0)->get();
        return view('admin.daftarNasabah', ['nasabah'=>$nasabah]);
    }

    function show(string $id){
        $nasabah = User::find($id);    
        return view('admin.detailNasabah', ['nasabah'=>$nasabah]);
    }

    function search(request $request){
        $request->validate([
            'param'=>'required|string'
        ]);

        return redirect()->route('admin.filteredNasabah', ['param'=>$request->param]);
    }

    function filtered(string $param){
        $pengurus = User::where('name', 'like', '%' . $param . '%')
                        ->where('is_admin', 0)
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
            'email'=>'required|email',
            'username'=>'required|string',
            'password'=>'required|string',
        ]);

        $nasabah = new User;
        $nasabah->name = $request->name;
        $nasabah->no_telp = $request->telp;
        $nasabah->email = $request->email;
        $nasabah->username = $request->username;
        $nasabah->password = Hash::make($request->password);
        $nasabah->save();

        $saldo = new Saldo;
        $saldo->user_id = $nasabah->id;
        $saldo->saldo = 0;
        $saldo->save();

        return redirect()->route('admin.daftarNasabah');
    }

    function edit(string $id){
        $nasabah = User::find($id);
        return view('admin.editNasabah', ['nasabah'=>$nasabah]);
    }

    function patch(request $request){
        // dd($request);

        $request->validate([
            'name'=>'required|string',
            'telp'=>'required|string|min:10',
            'email'=>'required|email',
            'username'=>'required|string',
            'saldo' => 'required|numeric'
        ]);

        $nasabah = User::find($request->idNasabah);
        $nasabah->name = $request->name;
        $nasabah->no_telp = $request->telp;
        $nasabah->email = $request->email;
        $nasabah->username = $request->username;
        if ($request->has('password')) {
            $nasabah->password = Hash::make($request->password);
        }        
        $nasabah->save();

        $saldo = Saldo::where('user_id', $request->idNasabah)->first();
        $saldo->saldo = $request->saldo;
        $saldo->save();

        return redirect()->route('admin.daftarNasabah');
    }

    function delete(string $id){
        // Saldo::where('user_id', $id)->delete();
        User::find($id)->delete();

        return redirect()->route('admin.daftarNasabah');
    }

    function export(){
        return Excel::download(new NasabahExport, 'Nasabah.xlsx');
    }
}
