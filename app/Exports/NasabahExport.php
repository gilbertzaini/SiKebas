<?php

namespace App\Exports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class NasabahExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('is_admin', 0)
                    ->select('id', 'name', 'username', 
                                'no_telp', 'email')
                    ->get();
    }

    public function title(): string
    {
        return 'Nasabah';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Username',
            'No. Telepon',
            'e-mail'
        ];
    }
}
