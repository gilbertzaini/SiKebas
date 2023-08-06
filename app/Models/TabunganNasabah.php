<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganNasabah extends Model
{
    use HasFactory;
    
    protected $table = 'tabungan_nasabah';

    public function nasabah(){
        return $this->belongsTo(Nasabah::class, 'idNasabah', 'id');
    }
}
