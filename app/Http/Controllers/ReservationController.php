<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupboard;
use App\Models\ReservationTime;
use Auth;
use App\Models\Locker;
use App\Models\Reservation;

class ReservationController extends Controller
{

    public function my_reservations() {
        $myReservations = Auth::user()->reservations;
        return view('student_views.my_reservations', compact('myReservations'));
    }

    public function reserve_now() {
        $reservation_time = ReservationTime::latest()->first();
        $cupBoards = Cupboard::all();

        return view('student_views.reserve_now', compact('cupBoards', 'reservation_time'));
    }

    public function completed_reservation(Reservation $reservation) {
        return view('student_views.completed_reservation', compact('reservation'));
    }

    public function reserve_locker(Request $request, Locker $locker) {
        $user = Auth::user();
        $reservation = $user->reservations()->create([
            'locker_id' => $locker->id,
            'status' => 'waiting'
        ]);

        return redirect(route('completed_resrevation', $reservation->id));
    }








    ///////////////// Admin Functions /////////////////



    public function index() {
        $reservations = Reservation::all();
        return view('admin_views.reservation_management.index', compact('reservations'));
    }

    
}
