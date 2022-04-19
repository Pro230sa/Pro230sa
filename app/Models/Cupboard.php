<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use Carbon\Carbon;

class Cupboard extends Model
{

    use HasFactory;

    protected $appends = ['available_lockers'];

    public static function boot() {
        parent::boot();

        Reservation::where('status', 'waiting')
        ->where('created_at', '<=', Carbon::now()
        ->subMinutes(1)->toDateTimeString())
        ->update(['status' => 'cancelled']);

        // TODO:uncomment to make it 3 days
        /*
            Reservation::where('status', 'waiting')
            ->where('created_at', '<=', Carbon::now()
            ->subDays(3)->toDateTimeString())
            ->update(['status' => 'cancelled']);
        */

    }

    public function lockers()
    {
        return $this->hasMany(Locker::class);
    }

    public function getAvailableLockersAttribute() {
        $availableLockers = $this->lockers->filter(function ($locker) {
            $reservation = $locker->reservations()->latest()->first();
            if($reservation) {
                return $reservation->status == 'completed' || $reservation->status == 'cancelled';
            }
            return true;
        });


        return $availableLockers;
    }
}
