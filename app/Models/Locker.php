<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;


    public function cupboard()
    {
        return $this->belongsTo(Cupboard::class);
    }
}
