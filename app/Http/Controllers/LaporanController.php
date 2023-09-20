<?php

namespace App\Http\Controllers;

use App\Exports\laporanNasabahExport;
use App\Models\DataSampah;
use App\Models\PembayaranLapak;
use App\Models\PenjualanSampah;
use App\Models\Sampah;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function kasNasabah()
    {
        $tanggalMulai = 0;
        $tanggalSelesai = 0;
        $records = TabunganNasabah::all();
        return view(
            'laporan.laporanArusKasNasabah',
            [
                'records' => $records,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function kasNasabahByDate(Request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        $records = TabunganNasabah::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        // dd($request, $tanggalMulai, $tanggalSelesai, $records);

        return view(
            'laporan.laporanArusKasNasabah',
            [
                'records' => $records,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesaiOri
            ]
        );
    }

    public function kasNasabahExport($tanggalMulai, $tanggalSelesai)
    {
        // Retrieve data from the database
        if ($tanggalMulai != 0 || $tanggalSelesai != 0) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->format('Y-m-d');
            $tanggalSelesaiOri = Carbon::parse($tanggalSelesai)->format('Y-m-d');
            $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

            $records = TabunganNasabah::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();
        } else {
            $records = TabunganNasabah::all();
        }

        return view('export.kasNasabahExport', compact('records', 'tanggalMulai', 'tanggalSelesai'));
    }

    public function nasabah()
    {
        $sampah = DataSampah::all()->sortBy(function ($item) {
            return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
        });
        $tanggalMulai = 0;
        $tanggalSelesai = 0;

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
            ->groupBy('kodeSampah')
            ->get();

        // Pass the data to the view
        return view(
            'laporan.laporanNasabah',
            [
                'sampah' => $sampah,
                'summedSetoran' => $summedSetoran,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function nasabahByDate(request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        $sampah = DataSampah::all()->sortBy(function ($item) {
            return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
        });
        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
            ->groupBy('kodeSampah')
            ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        // Pass the data to the view
        return view(
            'laporan.laporanNasabah',
            [
                'sampah' => $sampah,
                'summedSetoran' => $summedSetoran,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesaiOri
            ]
        );
    }

    public function nasabahExport($tanggalMulai, $tanggalSelesai)
    {
        $sampah = DataSampah::all();

        // Retrieve data from the database
        if ($tanggalMulai != 0 || $tanggalSelesai != 0) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->format('Y-m-d');
            $tanggalSelesaiOri = Carbon::parse($tanggalSelesai)->format('Y-m-d');
            $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

            $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
                ->groupBy('kodeSampah')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();
        } else {
            $summedSetoran = SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
                ->groupBy('kodeSampah')
                ->get();
        }

        return view('export.laporanNasabahExport', compact('summedSetoran', 'sampah', 'tanggalMulai', 'tanggalSelesai'));

        // $pdf = PDF::loadView('export.laporanNasabahExport', compact('summedSetoran', 'sampah'));
        // $pdf->setPaper('A4',  'potrait');
        // return $pdf->download('laporanNasabah.pdf');
    }


    public function pembayaranLapak()
    {
        $sampah = DataSampah::all();
        $tanggalMulai = 0;
        $tanggalSelesai = 0;

        $summedBerat = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
            ->groupBy('kodeSampah')
            ->get();

        $summedTotal = PenjualanSampah::select('kodeSampah', DB::raw('SUM(total) as totalJumlah'))
            ->groupBy('kodeSampah')
            ->get();

        // dd($summedBerat, $summedTotal);
        return view(
            'laporan.laporanPembayaranKeLapak',
            [
                'sampah' => $sampah,
                'summedBerat' => $summedBerat,
                'summedTotal' => $summedTotal,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function pembayaranLapakByDate(request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
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
        return view(
            'laporan.laporanPembayaranKeLapak',
            [
                'sampah' => $sampah,
                'summedBerat' => $summedBerat,
                'summedTotal' => $summedTotal,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesaiOri
            ]
        );
    }

    public function pembayaranLapakExport($tanggalMulai, $tanggalSelesai)
    {
        $sampah = DataSampah::all();

        // Retrieve data from the database
        if ($tanggalMulai != 0 || $tanggalSelesai != 0) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->format('Y-m-d');
            $tanggalSelesaiOri = Carbon::parse($tanggalSelesai)->format('Y-m-d');
            $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

            $summedBerat = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                ->groupBy('kodeSampah')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();

            $summedTotal = PenjualanSampah::select('kodeSampah', DB::raw('SUM(total) as totalJumlah'))
                ->groupBy('kodeSampah')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();
        } else {
            $summedBerat = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                ->groupBy('kodeSampah')
                ->get();

            $summedTotal = PenjualanSampah::select('kodeSampah', DB::raw('SUM(total) as totalJumlah'))
                ->groupBy('kodeSampah')
                ->get();
        }

        return view('export.pembayaranLapakExport', compact('sampah', 'summedBerat', 'summedTotal', 'tanggalMulai', 'tanggalSelesai'));
    }

    public function dlhk()
    {
        $sampah = DataSampah::all()->sortBy(function ($item) {
            return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
        });
        $tanggalMulai = 0;
        $tanggalSelesai = 0;

        // Calculate the sum of 'jumlah' field for each 'kodeSampah'
        $summedSampah = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
            ->groupBy('kodeSampah')
            ->get();

        // Pass the data to the view
        return view(
            'laporan.laporanDLHK',
            [
                'sampah' => $sampah,
                'summedSetoran' => $summedSampah,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function dlhkByDate(Request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        $sampah = DataSampah::all()->sortBy(function ($item) {
            return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
        });

        $summedSampah = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
            ->groupBy('kodeSampah')
            ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        return view(
            'laporan.laporanDLHK',
            [
                'sampah' => $sampah,
                'summedSetoran' => $summedSampah,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function dlhkExport($tanggalMulai, $tanggalSelesai)
    {
        if ($tanggalMulai != 0 || $tanggalSelesai != 0) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->format('Y-m-d');
            $tanggalSelesaiOri = Carbon::parse($tanggalSelesai)->format('Y-m-d');
            $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

            $sampah = DataSampah::all()->sortBy(function ($item) {
                return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
            });

            $summedSampah = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                ->groupBy('kodeSampah')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();
        } else {
            $sampah = DataSampah::all()->sortBy(function ($item) {
                return $item->kodeSampah == 10 ? 100 : (int)$item->kodeSampah;
            });

            $summedSampah = PenjualanSampah::select('kodeSampah', DB::raw('SUM(jumlah) as totalBerat'))
                ->groupBy('kodeSampah')
                ->get();
        }

        return view(
            'export.laporanDLHKExport',
            [
                'sampah' => $sampah,
                'summedSetoran' => $summedSampah,
                'tanggalMulai' => $tanggalMulai,
                'tanggalSelesai' => $tanggalSelesai
            ]
        );
    }

    public function internal()
    {
        $tanggalMulai = 0;
        $tanggalSelesai = 0;

        $debet = TabunganNasabah::where('kategori', 'Debet')->get();
        $kredit = TabunganNasabah::where('kategori', 'Kredit')->get();
        $lapak = PenjualanSampah::all();

        return view('laporan.laporanInternal', compact('tanggalMulai', 'tanggalSelesai', 'debet', 'kredit', 'lapak'));
    }

    public function internalByDate(request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        $tanggalMulai = Carbon::parse($request->tanggalMulai)->format('Y-m-d');
        $tanggalSelesaiOri = Carbon::parse($request->tanggalSelesai)->format('Y-m-d');
        $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

        $debet = TabunganNasabah::where('kategori', 'Debet')
            ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        $kredit = TabunganNasabah::where('kategori', 'Kredit')
            ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        $lapak = PenjualanSampah::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])->get();

        return view('laporan.laporanInternal', compact('tanggalMulai', 'tanggalSelesai', 'debet', 'kredit', 'lapak'));
    }

    public function internalExport($tanggalMulai, $tanggalSelesai)
    {
        if ($tanggalMulai != 0 || $tanggalSelesai != 0) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->format('Y-m-d');
            $tanggalSelesaiOri = Carbon::parse($tanggalSelesai)->format('Y-m-d');
            $tanggalSelesai = Carbon::parse($tanggalSelesaiOri)->addDay()->format('Y-m-d');

            $debet = TabunganNasabah::where('kategori', 'Debet')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();

            $kredit = TabunganNasabah::where('kategori', 'Kredit')
                ->whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
                ->get();

            $lapak = PenjualanSampah::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])->get();
        } else {
            $debet = TabunganNasabah::where('kategori', 'Debet')->get();
            $kredit = TabunganNasabah::where('kategori', 'Kredit')->get();
            $lapak = PenjualanSampah::all();
        }

        return view('export.laporanInternalExport', compact('debet', 'kredit', 'lapak', 'tanggalMulai', 'tanggalSelesai'));
    }
}
