<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'saldo'
    ];

    public function user(){
        return $this->BelongsTo(User::class, 'user_id');
    }
}
