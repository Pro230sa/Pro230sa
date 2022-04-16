<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // reservation -> user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // reservation -> locker
    public function locker() {
        return $this->belongsTo(Locker::class);
    }

    public function reservation_time() {
        return $this->belongsTo(ReservationTime::class);
    }
}
