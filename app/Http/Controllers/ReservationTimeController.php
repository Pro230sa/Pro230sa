<?php

namespace App\Http\Controllers;

use App\Models\ReservationTime;
use Illuminate\Http\Request;

use App\Http\Requests\ReservationTimesRequest;

class ReservationTimeController extends Controller
{
    public function index() {
        $reservation_times = ReservationTime::all();

        return view('admin_views.reservation_times.index', compact('reservation_times'));
    }

    public function create() {
        return view('admin_views.reservation_times.create');
    }

    public function store(ReservationTimesRequest $request) {
        $data = $request->validated();

        $data['status'] = isset($data['status']) && $data['status'] == 'on' ? true : false;

        ReservationTime::create($data);

        return redirect(route('admin.reservation_times'));

    }

    public function edit(ReservationTime $reservation_time) {
        return view('admin_views.reservation_times.edit', compact('reservation_time'));
    }

    public function update(ReservationTimesRequest $request, ReservationTime $reservation_time) {
        $data = $request->validated();

        $data['status'] = isset($data['status']) && $data['status'] == 'on' ? true : false;

        $reservation_time->update($data);

        return redirect(route('admin.reservation_times'));
    }
}
