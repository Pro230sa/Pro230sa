@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><b>Waiting Reservations</b></div>
                            <div class="h5 mb-0 font-weight-bold">{{$waiting_reservations_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-hourglass-empty fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><b>Accepted Reservations</b></div>
                            <div class="h5 mb-0 font-weight-bold">{{$accepted_reservations_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-receipt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><b>Completed Reservations</b></div>
                            <div class="h5 mb-0 font-weight-bold">{{$completed_reservations_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-check fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-8 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><b>Total Income</b></div>
                            <div class="h5 mb-0 font-weight-bold">{{$total_income}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-dollar-sign fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
