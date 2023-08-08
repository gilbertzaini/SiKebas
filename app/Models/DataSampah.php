<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    use HasFactory;
    // protected $primaryKey = 'kodeSampah';
    protected $table = 'data_sampahs';

    public function setoranNasabah(){
        return $this->hasMany(SetoranNasabah::class, 'kodeSampah');
    }

    public function pembayaranLapak(){
        return $this->hasMany(PembayaranLapak::class, 'kodeSampah', 'kodeSampah');
    }

    public function penjualanSampah(){
        return $this->hasMany(PenjualanSampah::class, 'kodeSampah');
    }
}
