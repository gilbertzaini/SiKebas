<?php

namespace App\Models;

use App\Models\PenjualanSampah;
use App\Models\TabunganNasabah;
use App\Models\SetoranNasabah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    public function setoranNasabah(){
        return $this->hasMany(SetoranNasabah::class, 'idNasabah');
    }

    public function tabunganNasabah(){
        return $this->hasMany(TabunganNasabah::class, 'idNasabah');
    }

    public function penjualanSampah(){
        return $this->hasMany(PenjualanSampah::class, 'idNasabah');
    }
}
