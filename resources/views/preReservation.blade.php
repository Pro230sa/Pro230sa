@extends('layouts.app')

@section('content')
<!--الكارد الي فيه حجوزاتي السابقه-->
<div class="container">
    <div class="card">
        <div class="card-header">
            My Reservation
        </div>
        <div class="card-body">
    <!--      <label for="l1" class="form-label text-center"> num locker: </label>
            <label for="ll1" class="form-label">...</label>
            <br/>
            <label for="l2" class="form-label"> الدور: </label>
            <label for="ll2" class="form-label">...</label>
            <br/>
            <label for="l3" class="form-label"> الرسوم: </label>
            <label for="ll3" class="form-label">...</label>
            <br/>
            <label for="l4" class="form-label"> المدة: </label>
            <label for="ll4" class="form-label">...</label>
            <br/>
            <label for="l5" class="form-label"> الحالة: </label>
            <label for="ll5" class="form-label">...</label>-->
            <ul>
                @foreach ($myReservations as $reservation)
                    <li>Name: {{$reservation->user->name}}</li>   
                    <li>University Email:{{$reservation->user->email}}</li>
                    <li>Department:{{$reservation->user->department}}</li>   
                    <li>Phone Number: {{$reservation->user->phone_number}}</li>    
                    <li>Bulding Name: {{$reservation->locker->cupboard->building_name}}</li>     
                    <li>Floor Number: {{$reservation->locker->cupboard->floor_number}}</li> 
                    <li>Cupboard Number: {{$reservation->locker->cupboard->number}}</li>   
                    <li>Locker Number: {{$reservation->locker->locker_number}}</li>
                    <li>Fee: {{$reservation->locker->fee}}</li>
                    <li>status:{{$reservation->status}}</li>   



                @endforeach
            </ul>
        </div>
    </div>
@endsection