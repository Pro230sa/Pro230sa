<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupboard extends Model
{

    use HasFactory;

    protected $appends = ['available_lockers'];

    public function lockers()
    {
        return $this->hasMany(Locker::class);
    }

    public function getAvailableLockersAttribute() {
        $availableLockers = $this->lockers->filter(function ($locker) {
            $reservation = $locker->reservations()->latest()->first();
            if($reservation) {
                return $reservation->status == 'completed';
            }
            return true;
        });


        return $availableLockers;
    }
}
