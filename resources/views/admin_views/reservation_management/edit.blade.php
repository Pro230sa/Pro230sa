@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <h4>Edit Reservation For Student | {{$reservation->user->name}}</h4>
    </div>

    <form class="row" method="post" action="{{route('admin.reservation_management.update', $reservation->id)}}">
        @method('put')
        @csrf
        <div class="col-sm-12 mt-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" value="{{$reservation->user->name}}" readonly>
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">Cupboard Number</label>
            <input type="text" class="form-control" value="{{$reservation->locker->cupboard->number}}" readonly>
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">Locker Number</label>
            <input type="text" class="form-control" value="{{$reservation->locker->locker_number}}" readonly>
        </div>
        
        <div class="col-sm-12 mt-3">
            <div class="d-flex flex-row bd-highlight mb-3">
                @if($reservation->status == 'waiting')
                    <button type="submit" name="status" value="accepted" class="btn btn-success mx-1">Student Paied And Got The Keys</button>
                @elseif($reservation->status == 'accepted')
                    <button type="submit" name="status" value="completed" class="btn btn-success mx-1">Student Retured The Keys</button>
                @endif
                
              </div>
        </div>
    </form>
    
</div>
@endsection
