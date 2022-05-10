@extends('layouts.app')
<!--style-->
<style type="text/css">
    h4{
        color:rgb(42, 147, 176);
    }
    </style>
    
@section('content')
<div class="container pt-5">
    <div class="row">
        <h4 ><b>Add Reservation Time</b></h4>
    </div>

    <form class="row" method="post" action="{{route('admin.reservation_times')}}">
        @csrf
        <div class="col-sm-12 mt-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter Reservation Time Title...">
        </div>
        
        <div class="col-sm-12 mt-3">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}">
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}">
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">Status</label>
            <br />
            <input type="checkbox" checked data-toggle="toggle" data-offstyle="danger" data-onstyle="success" data-on="Active" data-off="Not Active" name="status">
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">Locker Fee</label>
            <input type="number" class="form-control" name="locker_fee" value="{{old('locker_fee')}}" placeholder="Enter Locker Fee...">
        </div>
        <div class="col-sm-12 mt-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="6" placeholder="Enter Reservation Time Notes..."></textarea>
        </div>

        <div class="col-sm-12 mt-5">
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col-sm-2 p-0 text-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection
