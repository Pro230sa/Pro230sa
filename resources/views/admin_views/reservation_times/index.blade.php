@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-sm-3 p-0">
            <a href="{{route('admin.reservation_times.create')}}" class="btn btn-outline-info">Create Reservation Time</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Fee</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservation_times as $key => $reservation_time)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$reservation_time->title}}</td>
                        <td>{{$reservation_time->start_date}}</td>
                        <td>{{$reservation_time->end_date}}</td>
                        <td>{{$reservation_time->locker_fee}}</td>
                        <td>{{$reservation_time->notes}}</td>
                        <td>
                            <a href="{{route('admin.reservation_times.edit', $reservation_time->id)}}" class="btn btn-outline-secondary"><i class="fa fa-edit fa-fw"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
