<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
