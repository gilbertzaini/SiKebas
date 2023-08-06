<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\Nasabah;
use App\Models\PenjualanSampah;
use App\Models\Saldo;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
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

        $sampah = DataSampah::where('kodeSampah', $request->kodeSampah)->first();
        $saldoNasabah = Nasabah::where('id', $request->idNasabah)->first();;

        $setoranNasabah = new SetoranNasabah;
        $setoranNasabah->kodeSampah = $request->kodeSampah;
        $setoranNasabah->idNasabah = $request->idNasabah;
        $setoranNasabah->idPengurus = $request->idPengurus;
        $setoranNasabah->berat = $request->berat;
        $setoranNasabah->subtotal = $request->berat * $sampah->hargaNasabah;

        $saldoNasabah->saldo += $setoranNasabah->subtotal;

        $tabunganNasabah = new TabunganNasabah();
        $tabunganNasabah->idNasabah = $request->idNasabah;
        $tabunganNasabah->kategori = 'Debet';
        $tabunganNasabah->jumlah = $setoranNasabah->subtotal;
        $tabunganNasabah->keterangan = 'Setoran';
        $tabunganNasabah->saldoSementara = $saldoNasabah->saldo;

        $setoranNasabah->save();
        $tabunganNasabah->save();
        $saldoNasabah->save();

        $users = Nasabah::all();
        $target = $users->first();
        $setoran = SetoranNasabah::where('idNasabah', $target->id)->get();
        return view('transaksi.setoranNasabah', ['users' => $users, 'target' => $target, 'setoran' => $setoran]);
    }

    public function tabunganNasabah()
    {
        $tabungan = TabunganNasabah::all();
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

        $nasabah = Nasabah::where('id', $request->idNasabah)->first();
        // dd($request, $nasabah, $saldoNasabah);

        if ($request->tarik > $nasabah->saldo) {
            return redirect()->back()->with('error', 'Saldo Tidak Mencukupi.');
        } else {
            $nasabah->saldo -= $request->tarik;
        }

        $tabunganNasabah = new TabunganNasabah();
        $tabunganNasabah->idNasabah = $request->idNasabah;
        $tabunganNasabah->kategori = 'Kredit';
        $tabunganNasabah->jumlah = $request->tarik;
        if ($request->keterangan != NULL) $tabunganNasabah->keterangan = $request->keterangan;
        $tabunganNasabah->saldoSementara = $nasabah->saldo;
        $tabunganNasabah->save();
        $nasabah->save();

        return redirect()->route('admin.tabunganNasabah');
    }

    public function transaksiPenjualanNasabah()
    {
        $nasabah = Nasabah::all();
        $penjualan = PenjualanSampah::all();
        return view('transaksi.penjualanNasabah', ['nasabah' => $nasabah, 'penjualan' => $penjualan]);
    }
}
