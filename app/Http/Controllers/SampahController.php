<?php

namespace App\Http\Controllers;

use App\Exports\SampahExport;
use App\Models\DataSampah;
use App\Models\Sampah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SampahController extends Controller
{
    function showAll() {
        $sampah = Sampah::all();
        return view('admin.kategoriSampah', ['sampah'=>$sampah]);
    }

    function show(string $id){
        $sampah = Sampah::find($id);    
        return view('admin.kategoriSampah', ['sampah'=>$sampah]);
    }

    function showData(){
        $metal = DataSampah::where('jenis', 'metal')->get();
        $plastik = DataSampah::where('jenis', 'plastik')->get();
        $beling = DataSampah::where('jenis', 'Beling/Kaca')->get();
        $kertas = DataSampah::where('jenis', 'kertas')->get();
        $akrilik = DataSampah::where('jenis', 'akrilik')->get();
        $fiber = DataSampah::where('jenis', 'fiber')->get();
        $elektronik = DataSampah::where('jenis', 'elektronik')->get();

        // dd($sampah);
        return view('admin.daftarSampah', [
            'metal'=>$metal,
            'plastik'=>$plastik,
            'beling'=>$beling,
            'kertas'=>$kertas,
            'akrilik'=>$akrilik,
            'fiber'=>$fiber,
            'elektronik'=>$elektronik,
        ]);
    }

    function search(request $request){
        $request->validate([
            'param'=>'required|string'
        ]);

        return redirect()->route('admin.filteredSampah', ['param'=>$request->param]);
    }

    function filtered(string $param){
        $sampah = Sampah::where('jenis', 'like', '%' . $param . '%')->get();
        return view('admin.kategoriSampah', ['sampah'=>$sampah]);
    }

    function create(request $request){        
        return view("admin.kategoriBaru");
    }

    function store(request $request){
        $request->validate([
            'jenis'=>'required|string',
            'harga'=>'required|numeric',
        ]);

        $sampah = new Sampah;
        $sampah->jenis = $request->jenis;
        $sampah->harga = $request->harga;
        $sampah->save();

        return redirect()->route('admin.kategoriSampah');
    }

    function edit(string $id){
        $sampah = Sampah::find($id);

        return view("admin.editKategori", ['sampah'=>$sampah]);
    }

    function patch(request $request){
        $request->validate([
            'jenis'=>'required|string',
            'harga'=>'required|numeric',
        ]);

        $sampah = Sampah::find($request->idSampah);
        $sampah->jenis = $request->jenis;
        $sampah->harga = $request->harga;
        $sampah->save();

        return redirect()->route('admin.kategoriSampah');
    }

    function delete(string $id){
        Sampah::find($id)->delete();

        return redirect()->route('admin.kategoriSampah');
    }

    function export(){
        return Excel::download(new SampahExport, 'Sampah.xlsx');
    }
}
