<?php

namespace App\Http\Controllers;

use App\Exports\PengurusExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class PengurusController extends Controller
{
    function showAll()
    {
        $pengurus = User::all();
        return view('admin.daftarpengurus', ['pengurus' => $pengurus]);
    }

    function show(string $id)
    {
        $pengurus = User::find($id);
        return view('admin.daftarPengurus', ['pengurus' => $pengurus]);
    }

    function create()
    {
        return view('admin.pengurusBaru');
    }

    function store(request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'jabatan' => 'required|string',
            'telp' => 'required|string|min:10',
            'username' => 'required|string',
            'password' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $pengurus = new User;
        $pengurus->name = $request->name;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->no_telp = $request->telp;
        $pengurus->alamat = $request->alamat;
        $pengurus->username = $request->username;
        $pengurus->password = Hash::make($request->password);
        $pengurus->save();

        return redirect()->route('admin.daftarPengurus');
    }

    function search(request $request)
    {
        $request->validate([
            'param' => 'required|string'
        ]);

        return redirect()->route('admin.filteredPengurus', ['param' => $request->param]);
    }

    function filtered(string $param)
    {
        $pengurus = User::where('name', 'like', '%' . $param . '%')
            ->get();

        return view('admin.daftarPengurus', ['pengurus' => $pengurus]);
    }

    function edit(string $id)
    {
        $pengurus = User::find($id);
        return view('admin.editPengurus',  ['pengurus' => $pengurus]);
    }

    function patch(request $request)
    {
        $request->validate([
            'idPengurus' => 'required|string',
            'name' => 'required|string',
            'telp' => 'required|string|min:10',
            'alamat' => 'required|string',
        ]);

        $pengurus = User::find($request->idPengurus);

        // dd($request);
        // dd($request, $pengurus, Hash::make($request->oldPassword), $pengurus->password);
        $pengurus->name = $request->name;
        $pengurus->no_telp = $request->telp;
        $pengurus->alamat = $request->alamat;
        if ($request->has('jabatan')) {
            $pengurus->jabatan = $request->jabatan;
        }
        if ($request->has('username')) {
            $pengurus->username = $request->username;
        }
        // if ($request->has('password') && $request->has('oldPassword')) {
        if ($request->password != NULL && $request->oldPassword != NULL) {
            if (Hash::check($request->oldPassword, $pengurus->password)) {
                $pengurus->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'Password Salah');
            }
        }
        $pengurus->save();

        return redirect()->route('admin.daftarPengurus');
    }

    function delete(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.daftarPengurus');
    }

    // function export(){
    //     return Excel::download(new PengurusExport, 'Pengurus.xlsx');
    // }
}
