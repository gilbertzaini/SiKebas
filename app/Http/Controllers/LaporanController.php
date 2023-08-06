<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\PembayaranLapak;
use App\Models\PenjualanSampah;
use App\Models\Sampah;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function kasNasabah(){
        $tanggalMulai = NULL;
        $tanggalSelesai = NULL;
        $records = TabunganNasabah::all();
        return view('laporan.laporanArusKasNasabah', 
                    [
                        'records' => $records, 
                        'tanggalMulai'=>$tanggalMulai, 
                        'tanggalSelesai'=>$tanggalSelesai
                    ]);
    }

    public function kasNasabahByDate(Request $request)
    {
        $request->validate([
            'tanggalMulai'=>'required|date',
            'tanggalSelesai'=>'required|date',
        ]);

        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        $records = TabunganNasabah::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                                  ->get();
    
        // dd($request, $tanggalMulai, $tanggalSelesai, $records);

        return view('laporan.laporanArusKasNasabah', 
                    [
                        'records' => $records, 
                        'tanggalMulai'=>$tanggalMulai, 
                        'tanggalSelesai'=>$tanggalSelesaiOri
                    ]);
    }

    public function nasabah(){        
        $sampah = DataSampah::all();
        $tanggalMulai = NULL;
        $tanggalSelesai = NULL;

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
                               ->groupBy('kodeSampah')
                               ->get();
    
        // Pass the data to the view
        return view('laporan.laporanNasabah', 
                    [
                        'sampah'=>$sampah, 
                        'summedSetoran'=>$summedSetoran, 
                        'tanggalMulai'=>$tanggalMulai, 
                        'tanggalSelesai'=>$tanggalSelesai
                    ]);
    }

    public function nasabahByDate(request $request){        
        $request->validate([
            'tanggalMulai'=>'required|date',
            'tanggalSelesai'=>'required|date',
        ]);
        
        $sampah = DataSampah::all();
        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
                               ->groupBy('kodeSampah')
                               ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                               ->get();
    
        // Pass the data to the view
        return view('laporan.laporanNasabah', 
                    [
                        'sampah'=>$sampah, 
                        'summedSetoran'=>$summedSetoran, 
                        'tanggalMulai'=>$tanggalMulai, 
                        'tanggalSelesai'=>$tanggalSelesaiOri
                    ]);
    }

    public function pembayaranLapak(){
        $sampah = DataSampah::all();
        $tanggalMulai = NULL;
        $tanggalSelesai = NULL;

        $summedBerat = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                                        ->groupBy('kodeSampah')
                                        ->get();

        $summedTotal = PenjualanSampah::select('kodeSampah', DB::raw('SUM(total) as totalJumlah'))
                                        ->groupBy('kodeSampah')
                                        ->get();

        // dd($summedBerat, $summedTotal);
        return view('laporan.laporanPembayaranKeLapak', 
        [
            'sampah'=>$sampah, 
            'summedBerat'=>$summedBerat, 
            'summedTotal'=>$summedTotal,
            'tanggalMulai'=>$tanggalMulai,
            'tanggalSelesai'=>$tanggalSelesai
        ]);        
    }

    public function pembayaranLapakByDate(request $request){
        $request->validate([
            'tanggalMulai'=>'required|date',
            'tanggalSelesai'=>'required|date',
        ]);
        
        $sampah = DataSampah::all();
        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');
        
        $sampah = DataSampah::all();
        $summedBerat = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                                        ->groupBy('kodeSampah')
                                        ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                                        ->get();

        $summedTotal = PenjualanSampah::select('kodeSampah', DB::raw('SUM(total) as totalJumlah'))
                                        ->groupBy('kodeSampah')
                                        ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                                        ->get();

        // dd($summedBerat, $summedTotal);
        return view('laporan.laporanPembayaranKeLapak', 
                    [
                        'sampah'=>$sampah, 
                        'summedBerat'=>$summedBerat, 
                        'summedTotal'=>$summedTotal,
                        'tanggalMulai'=>$tanggalMulai,
                        'tanggalSelesai'=>$tanggalSelesaiOri
                    ]);        
    }
}
