<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabunganNasabah extends Model
{
    use HasFactory;
    
    protected $table = 'tabungan_nasabah';

    public function user(){
        return $this->belongsTo(User::class, 'idNasabah');
    }
}
