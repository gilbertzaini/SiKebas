<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\Nasabah;
use App\Models\Pelapak;
use App\Models\PenjualanSampah;
use App\Models\Saldo;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use Hamcrest\Core\Set;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function setoranNasabah()
    {
        $nasabahs = Nasabah::all();
        $pengurus = User::all();

        $target = $nasabahs->first();
        $targetPengurus = NULL;

        $setoran = SetoranNasabah::where('idNasabah', $target->id)->get();
        return view(
            'transaksi.setoranNasabah',
            [
                'nasabahs' => $nasabahs,
                'target' => $target,
                'setoran' => $setoran,
                'pengurus' => $pengurus,
                'targetPengurus' => $targetPengurus,
            ]
        );
    }

    public function setoranNasabahById(request $request)
    {
        $nasabahs = Nasabah::all();
        $pengurus = User::all();

        $target = Nasabah::where('id', $request->idNasabah)->first();
        if($request->idPengurus != "all") $targetPengurus = User::where('id', $request->idPengurus)->first();
        else $targetPengurus = NULL;
                
        // dd($request, $target, $targetPengurus);

        $setoran = SetoranNasabah::where('idNasabah', $target->id);
        if($request->idPengurus != "all") $setoran = $setoran->where('idPengurus', $targetPengurus->id)->get();
        else $setoran = $setoran->get();

        $setoran->sortBy('created_at');

        return view(
            'transaksi.setoranNasabah',
            [
                'nasabahs' => $nasabahs,
                'target' => $target,
                'setoran' => $setoran,
                'pengurus' => $pengurus,
                'targetPengurus' => $targetPengurus,
            ]
        );
    }

    public function setoranNasabahBaru(string $id)
    {
        $nasabah = Nasabah::find($id);
        $pengurus = Auth::user();
        $sampah = DataSampah::all()->sortBy('nama');
        return view('transaksi.setoranNasabahBaru', ['nasabah' => $nasabah, 'pengurus' => $pengurus, 'sampah' => $sampah]);
    }

    public function storeSetoranNasabahBaru(request $request)
    {
        $request->validate([
            'idNasabah' => 'required|string',
            'idPengurus' => 'required|string',
            'kodeSampah' => 'required|string',
            'berat' => 'required|numeric',
        ]);

        $date = now()->format('dmy');
        $count = SetoranNasabah::whereDate('created_at', today())->count() + 1;
        $customId = 'TS' . $date . str_pad($count, 3, '0', STR_PAD_LEFT);

        $sampah = DataSampah::where('kodeSampah', $request->kodeSampah)->first();
        $saldoNasabah = Nasabah::where('id', $request->idNasabah)->first();;

        $setoranNasabah = new SetoranNasabah;
        $setoranNasabah->kodeTransaksi = $customId;
        $setoranNasabah->kodeSampah = $request->kodeSampah;
        $setoranNasabah->idNasabah = $request->idNasabah;
        $setoranNasabah->idPengurus = $request->idPengurus;
        $setoranNasabah->berat = $request->berat;
        $setoranNasabah->subtotal = $request->berat * $sampah->hargaNasabah;

        $saldoNasabah->saldo += $setoranNasabah->subtotal;

        $tabunganNasabah = new TabunganNasabah();
        $tabunganNasabah->kodeTransaksi = $customId;
        $tabunganNasabah->idNasabah = $request->idNasabah;
        $tabunganNasabah->kategori = 'Debet';
        $tabunganNasabah->jumlah = $setoranNasabah->subtotal;
        $tabunganNasabah->keterangan = 'Setoran';
        $tabunganNasabah->saldoSementara = $saldoNasabah->saldo;

        $sampah->stok += $request->berat;

        $setoranNasabah->save();
        $tabunganNasabah->save();
        $saldoNasabah->save();
        $sampah->save();

        $nasabahs = Nasabah::all();
        $pengurus = User::all();
        $target = $nasabahs->first();
        if($request->idPengurus != "all") $targetPengurus = User::where('id', $request->idPengurus)->first();
        else $targetPengurus = NULL;
        $setoran = SetoranNasabah::where('idNasabah', $target->id)->get();
        return view(
            'transaksi.setoranNasabah',
            [
                'nasabahs' => $nasabahs,
                'target' => $target,
                'setoran' => $setoran,
                'pengurus' => $pengurus,
                'targetPengurus' => $targetPengurus,
            ]
        );
    }

    public function tabunganNasabah()
    {
        $tabungan = TabunganNasabah::all()->sortBy('created_at');
        return view('transaksi.tabunganNasabah', ['tabungan' => $tabungan]);
    }

    public function penarikanNasabah()
    {
        $nasabah = Nasabah::all();
        return view('transaksi.formPenarikanNasabah', ['nasabah' => $nasabah]);
    }

    public function storePenarikanNasabah(request $request)
    {
        $request->validate([
            'idNasabah' => 'required|string',
            'tarik' => 'required|numeric',
        ]);

        $date = now()->format('dmy');
        $count = TabunganNasabah::where('kategori', 'Kredit')
                                ->whereDate('created_at', today())->count() + 1;
        $customId = 'TT' . $date . str_pad($count, 3, '0', STR_PAD_LEFT);

        $nasabah = Nasabah::where('id', $request->idNasabah)->first();
        // dd($request, $nasabah, $saldoNasabah);

        if ($request->tarik > $nasabah->saldo) {
            return redirect()->back()->with('error', 'Saldo Tidak Mencukupi.');
        } else {
            $nasabah->saldo -= $request->tarik;
        }

        $tabunganNasabah = new TabunganNasabah();
        $tabunganNasabah->kodeTransaksi = $customId;
        $tabunganNasabah->idNasabah = $request->idNasabah;
        $tabunganNasabah->kategori = 'Kredit';
        $tabunganNasabah->jumlah = $request->tarik;
        if ($request->keterangan != NULL) $tabunganNasabah->keterangan = $request->keterangan;
        $tabunganNasabah->saldoSementara = $nasabah->saldo;
        $tabunganNasabah->save();
        $nasabah->save();

        return redirect()->route('admin.tabunganNasabah');
    }

    // public function transaksiPenjualanNasabah()
    // {
    //     $nasabah = Nasabah::all();
    //     $penjualan = PenjualanSampah::all();
    //     return view('transaksi.penjualanNasabah', ['nasabah' => $nasabah, 'penjualan' => $penjualan]);
    // }

    public function transaksiPenjualanNasabah()
    {
        $penjualan = PenjualanSampah::all();
        return view('transaksi.penjualanNasabah', ['penjualan' => $penjualan]);
    }

    public function tambahPenjualanSampah(){
        $sampahs = DataSampah::where('stok', '>', 0)->get();
        $pelapaks = Pelapak::all();
        return view('transaksi.penjualanSampahBaru', ['sampahs'=>$sampahs, 'pelapaks'=>$pelapaks]);
    }

    public function storePenjualanSampah(request $request){
        // dd($request);
        
        $request->validate([
            'idPelapak' => 'required|string',
            'kodeSampah' => 'required|string',
            'berat' => 'required|numeric',
        ]);

        $date = now()->format('dmy');
        $count = PenjualanSampah::whereDate('created_at', today())->count() + 1;
        $customId = 'TL' . $date . str_pad($count, 3, '0', STR_PAD_LEFT);

        $sampah = DataSampah::where('kodeSampah', $request->kodeSampah)->first();
        // dd($request, $sampah);

        if ($request->berat > $sampah->stok) {
            return redirect()->back()->with('error', 'Stok Tidak Mencukupi.');
        } else {
            $sampah->stok -= $request->berat;
            $sampah->save();
        }

        $penjualanSampah = new PenjualanSampah();
        $penjualanSampah->kodeTransaksi = $customId;
        $penjualanSampah->kodeSampah = $request->kodeSampah;
        $penjualanSampah->idPelapak = $request->idPelapak;
        $penjualanSampah->hargaLapak = $sampah->hargaLapak;
        $penjualanSampah->jumlah = $request->berat;
        $penjualanSampah->total = $request->berat * $sampah->hargaLapak;

        $penjualanSampah->save();

        return redirect()->route('admin.transaksiPenjualanNasabah');
    }
}
