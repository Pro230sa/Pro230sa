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
    <div class="card">
        <div class="card-header">
            <h4><b> Reservation Information </b><h4>
        </div>
        <div class="alert alert-success" role="alert">
        
        <strong>The reservation has been successfully completed</strong> Please go to the office of Ms.
            Noura in the literary building to receive the key and pay the fees        </div>
        <div class="card-body">
        
                <h5><b >Name:</b>&nbsp{{$reservation->user->name}}. </h5> 
                <h5><b >University Email:</b>&nbsp{{$reservation->user->email}}.</h5>
                <h5><b >Department:</b>&nbsp{{$reservation->user->department}}.</h5>
                <h5><b >Phone Number:</b>&nbsp{{$reservation->user->phone_number}}.</h5>
                <h5><b >Bulding Name:</b>&nbsp{{$reservation->locker->cupboard->building_name}}.</h5>    
                <h5><b >Floor Number:</b>&nbsp{{$reservation->locker->cupboard->floor_number}}.</h5>
                <h5><b >Cupboard Number:</b>&nbsp{{$reservation->locker->cupboard->number}}.</h5>
                <h5><b >Locker Number:</b>&nbsp{{$reservation->locker->locker_number}}.</h5>
                <h5><b >Fee:</b>&nbsp{{$reservation->reservation_time->locker_fee}}.</h5>
                <h5><b >status:</b>&nbsp{{$reservation->status}}.</h5>
        </div>
    </div>
@endsection