<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ReservationTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $myReservations = Auth::user()->reservations;
        return view('student_views.my_reservations', compact('myReservations'));
    }

    public function admin_dashboard() {
        $reservation_time = ReservationTime::latest()->first();

        $waiting_reservations_count = $reservation_time->reservations()->where(function($query) {
            return $query->where('status', 'waiting');
        })->count();

        $accepted_reservations_count = $reservation_time->reservations()->where(function($query) {
            return $query->where('status', 'accepted');
        })->count();

        $completed_reservations_count = $reservation_time->reservations()->where(function($query) {
            return $query->where('status', 'completed');
        })->count();

        $total_income = ($accepted_reservations_count + $completed_reservations_count) * $reservation_time->locker_fee;
        
        return view('admin_views.dashboard', compact('waiting_reservations_count', 'accepted_reservations_count', 'completed_reservations_count', 'total_income'));
    }
}
