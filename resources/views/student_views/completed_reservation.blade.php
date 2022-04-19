@extends('layouts.app')

@section('content')
<!--الكارد الي فيه حجوزاتي السابقه-->
<div class="container">
    <div class="card">
        <div class="card-header">
            Reservation Information
        </div>
        <div class="card-body">
            <ul>
                <li>Name: {{$reservation->user->name}}</li>   
                <li>University Email:{{$reservation->user->email}}</li>
                <li>Department:{{$reservation->user->department}}</li>   
                <li>Phone Number: {{$reservation->user->phone_number}}</li>    
                <li>Bulding Name: {{$reservation->locker->cupboard->building_name}}</li>     
                <li>Floor Number: {{$reservation->locker->cupboard->floor_number}}</li> 
                <li>Cupboard Number: {{$reservation->locker->cupboard->number}}</li>   
                <li>Locker Number: {{$reservation->locker->locker_number}}</li>
                <li>Fee: {{$reservation->reservation_time->locker_fee}} SAR</li>
                <li>status:{{$reservation->status}}</li>
            </ul>
        </div>
    </div>
@endsection