@extends('layouts.app')
<style>

div { font-size: large; }

.card {
  margin: 20px;
  padding: 20px;
  width: 1150px;
  min-height: 200px;
  display: grid;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;
}

.card {
  background: linear-gradient(90deg, rgba(148,187,233,1) 0%, rgba(240,248,255,1) 0%);
}
</style>

@section('content')
<!--الكارد الي فيه حجوزاتي السابقه-->
<div class="container">

    @foreach ($myReservations as $reservation)
        <div class="card mt-3">
            <div class="card-header">
               <b> {{$reservation->locker->locker_number}} | {{$reservation->created_at}} </b>
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
                        <li>Fee: {{$reservation->reservation_time->locker_fee}}</li>
                        <li>status:{{$reservation->status}}</li>   
                    </ul>
                </div>
        </div>
    @endforeach
@endsection