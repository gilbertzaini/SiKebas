<?php

namespace App\Exports;

use App\Models\SetoranNasabah;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class laporanNasabahExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SetoranNasabah::select('kodeSampah', DB::raw('SUM(berat) as totalBerat'))
            ->groupBy('kodeSampah')
            ->get();
    }

    public function title(): string
    {
        return 'Laporan Rekap Total Sampah Penimbangan Nasabah';
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Sampah',
            'Nama Sampah',
            'Berat Total'
        ];
    }
}
