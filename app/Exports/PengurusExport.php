<?php

namespace App\Exports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PengurusExport implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('is_admin', 1)
                    ->select('id', 'name', 'username', 
                                'no_telp', 'email')
                    ->get();
    }

    public function title(): string
    {
        return 'Pengurus';
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
