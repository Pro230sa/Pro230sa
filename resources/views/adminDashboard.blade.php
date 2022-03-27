@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">لوحة تحكم الأدمن</div>

                <div class="card-body">
                    <ul>
                        @foreach ($reservations as $reservation)
                            <li>user name: {{$reservation->user->name}}</li>   
                            <li>floor number: {{$reservation->locker->cupboard->floor_number}}</li>   
                            <li>cupboard number: {{$reservation->locker->cupboard->number}}</li>   
                            <li>locker number: {{$reservation->locker->locker_number}}</li>   
                            ========
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
