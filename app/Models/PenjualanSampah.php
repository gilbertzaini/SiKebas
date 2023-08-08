<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    use HasFactory;
    protected $table='penjualan_sampah';

    public function dataSampah(){
        return $this->belongsTo(DataSampah::class, 'kodeSampah', 'kodeSampah');
    }

    public function pelapak(){
        return $this->belongsTo(Pelapak::class, 'idPelapak');
    }
}
