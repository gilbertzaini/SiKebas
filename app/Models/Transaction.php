<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sampah_id',
        'jenis',
        'jumlah',
        'total',
        'tanggalTransaksi',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sampah(){
        return $this->belongsTo(Sampah::class, 'sampah_id');
    }
}
