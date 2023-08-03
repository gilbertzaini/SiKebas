<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetoranNasabah extends Model
{
    use HasFactory;
    
    protected $table = 'setoran_nasabah';

    public function user()
    {
        return $this->belongsTo(User::class, 'idNasabah');
    }

    public function dataSampah()
    {
        return $this->belongsTo(DataSampah::class, 'kodeSampah', 'kodeSampah');
    }
}
