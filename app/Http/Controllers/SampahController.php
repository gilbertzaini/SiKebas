<?php

namespace App\Http\Controllers;

use App\Exports\SampahExport;
use App\Models\DataSampah;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SampahController extends Controller
{
    function showAll()
    {
        $sampah = KategoriSampah::all();
        return view('admin.kategoriSampah', ['sampah' => $sampah]);
    }

    function show(string $id)
    {
        $sampah = KategoriSampah::find($id);
        return view('admin.kategoriSampah', ['sampah' => $sampah]);
    }

    function search(request $request)
    {
        $request->validate([
            'param' => 'required|string'
        ]);

        return redirect()->route('admin.filteredSampah', ['param' => $request->param]);
    }

    function filtered(string $param)
    {
        $sampah = KategoriSampah::where('kategori', 'like', '%' . $param . '%')->get();
        return view('admin.kategoriSampah', ['sampah' => $sampah]);
    }

    function create()
    {
        return view("admin.kategoriBaru");
    }

    function store(request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
        ]);

        $sampah = new KategoriSampah;
        $sampah->kategori = $request->kategori;
        $sampah->save();

        return redirect()->route('admin.kategoriSampah');
    }

    function edit(string $id)
    {
        $sampah = KategoriSampah::find($id);

        return view("admin.editKategori", ['sampah' => $sampah]);
    }

    function patch(request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
        ]);

        $sampah = KategoriSampah::find($request->idSampah);
        $sampah->kategori = $request->kategori;
        $sampah->save();

        return redirect()->route('admin.kategoriSampah');
    }

    function delete(string $id)
    {
        KategoriSampah::find($id)->delete();

        return redirect()->route('admin.kategoriSampah');
    }

    function showData()
    {
        $dataSampahSorted = DataSampah::all()->sortBy(function ($item) {
            return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
        });

        $dataSampahByJenis = $dataSampahSorted->groupBy('jenis');

        return view('admin.daftarSampah', [
            'dataSampahByJenis' => $dataSampahByJenis,
        ]);
    }

    function createDataSampah()
    {
        $jenisSampah = KategoriSampah::get();

        return view('admin.dataSampahBaru', ['jenisSampah' => $jenisSampah]);
    }

    function storeDataSampah(request $request)
    {
        $request->validate([
            'kategori' => 'required|numeric',
            'nama' => 'required|string',
            'hargaNasabah' => 'required|numeric',
            'hargaPelapak' => 'required|numeric',
        ]);

        $kategori = KategoriSampah::where('id', $request->kategori)->first();
        $serialNumber = DataSampah::where('jenis', $kategori->kategori)->count();
        $serialNumber++;

        $alphabets = range('A', 'Z');
        $result = '';

        do {
            $index = ($serialNumber - 1) % 26;
            $result = $alphabets[$index] . $result;
            $serialNumber = intval(($serialNumber - $index) / 26);
        } while ($serialNumber > 0);

        // dd($request, $kategori, $serialNumber,  $result);

        $dataSampah = new DataSampah;
        $dataSampah->kodeSampah = $request->kategori . $result;
        $dataSampah->jenis = $kategori->kategori;
        $dataSampah->nama = $request->nama;
        $dataSampah->hargaLapak = $request->hargaPelapak;
        $dataSampah->hargaNasabah = $request->hargaNasabah;
        $dataSampah->save();

        return redirect()->route('admin.dataSampah');
        // dd($dataSampah);
    }

    function editDataSampah(string $kodeSampah)
    {   
        $jenisSampah = KategoriSampah::get();
        $sampah = DataSampah::where('kodeSampah', $kodeSampah)->first();

        return view('admin.editDataSampah', compact('jenisSampah', 'sampah'));
    }

    function patchDataSampah(request $request)
    {
        $request->validate([
            'kodeSampah' => 'required|string',
            'kategori' => 'required|numeric',
            'nama' => 'required|string',
            'hargaNasabah' => 'required|numeric',
            'hargaPelapak' => 'required|numeric',
        ]);

        $sampah = DataSampah::where('kodeSampah', $request->kodeSampah)->first();

        $sampah->jenis = KategoriSampah::where('id', $request->kategori)->first()->kategori;
        $sampah->nama = $request->nama;
        $sampah->hargaNasabah = $request->hargaNasabah;
        $sampah->hargaLapak = $request->hargaPelapak;
        $sampah->save();

        return redirect()->route('admin.dataSampah');
    }

    function deleteDataSampah(string $kodeSampah)
    {
        DataSampah::where("kodeSampah", $kodeSampah)->first()->delete();

        return redirect()->route('admin.dataSampah');
    }
}
