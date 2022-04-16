@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
    <!-- mm 
        <div class="col-sm-3 p-0">
            {{-- <a href="{{route('admin.reservation_times.create')}}" class="btn btn-success">Create Reservation Time</a> --}}
        </div>
          -->
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cupboard</th>
                    <th>Locker</th>
                    <th>Reservation Time</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Fee Receipt</th>
                    <th>key of Locker </th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($reservation_times as $key => $reservation_time)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$cupboards->number}}</td>
                        <td>{{$lockers->locker_number}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->phone_number}}</td>
                        <td>{{$reservations->status}}</td>
                        <td>
                            <a href="{{route('admin.reservation_times.edit', $reservation_time->id)}}" class="btn btn-outline-secondary"><i class="fa fa-edit fa-fw"></i></a>
                        </td>
                        
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
