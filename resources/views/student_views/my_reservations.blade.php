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

.text{color:rgb(42, 147, 176)}
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
                
                        <h5><b class="text">Name:</b>&nbsp{{$reservation->user->name}}. </h5> 
                        <h5><b class="text">University Email:</b>&nbsp{{$reservation->user->email}}.</h5>
                        <h5><b class="text">Department:</b>&nbsp{{$reservation->user->department}}.</h5>
                        <h5><b class="text">Phone Number:</b>&nbsp{{$reservation->user->phone_number}}.</h5>
                        <h5><b class="text">Bulding Name:</b>&nbsp{{$reservation->locker->cupboard->building_name}}.</h5>    
                        <h5><b class="text">Floor Number:</b>&nbsp{{$reservation->locker->cupboard->floor_number}}.</h5>
                        <h5><b class="text">Cupboard Number:</b>&nbsp{{$reservation->locker->cupboard->number}}.</h5>
                        <h5><b class="text">Locker Number:</b>&nbsp{{$reservation->locker->locker_number}}.</h5>
                        <h5><b class="text">Fee:</b>&nbsp{{$reservation->reservation_time->locker_fee}}.</h5>
                        <h5><b class="text">status:</b>&nbsp{{$reservation->status}}.</h5>
                  
                </div>
        </div>
    @endforeach
@endsection