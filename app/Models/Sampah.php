<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'harga'
    ];

    public function Transaksi(){
        return $this->hasMany(Transaction::class, 'sampah_id');
    }
}
