<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSampah extends Model
{
    use HasFactory;
    protected $table='penjualan_sampah';

    public function dataSampah(){
        return $this->belongsTo(DataSampah::class, 'kodeSampah');
    }

    public function user(){
        return $this->belongsTo(User::class, 'idNasabah');
    }
}
