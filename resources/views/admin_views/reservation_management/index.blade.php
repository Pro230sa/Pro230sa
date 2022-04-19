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
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cupboard</th>
                    <th>Locker</th>
                    <th>Reservation Time</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $key => $reservation)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$reservation->locker->cupboard->number}}</td>
                        <td>{{$reservation->locker->locker_number}}</td>
                        <td>{{$reservation->reservation_time->title}}</td>
                        <td>{{$reservation->user->name}}</td>
                        <td>{{$reservation->user->phone_number}}</td>
                        <td>
                            @if($reservation->status == 'waiting')
                                <span class="badge bg-secondary">Waiting For Student</span>
                            @elseif($reservation->status == 'accepted')
                                <span class="badge bg-primary">Student Has The Key</span>
                            @elseif($reservation->status == 'completed')
                                <span class="badge bg-success">Student Returned The Key</span>
                            @elseif($reservation->status == 'cancelled')
                                <span class="badge bg-danger">Student Didn't Pay</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.reservation_management.edit', $reservation->id)}}" class="btn btn-outline-secondary"><i class="fa fa-edit fa-fw"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script>
      
        $(document).ready( function () {    
            $('#myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-csv"></i> Export Records To Excel',
                        
                        exportOptions: {
                            columns: ':visible',
                            rows: ':visible'
                        }
                    },
                ]
            });
        });

    </script>
@endsection
