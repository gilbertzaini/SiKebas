<?php

namespace App\Exports;

use App\Models\sampah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SampahExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sampah::all();
    }

    public function title(): string
    {
        return 'Sampah';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Jenis Sampah',
            'Harga/Kg',
            'created_at',
            'updated_at'
        ];
    }
}
