<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranLapak extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_lapak';

    public function dataSampah(){
        return $this->belongsTo(DataSampah::class, 'kodeSampah');
    }
}
