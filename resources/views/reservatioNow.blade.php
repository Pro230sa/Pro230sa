@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- foreach (cupboards) --}}
        @foreach ($cupBoards as $cupBoard)
          <div class="col-3 mt-3">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$cupBoard->number}}</h5>
                  <p class="card-text">Floor Number: {{$cupBoard->floor_number}}</p>
                  <a class="btn btn-primary" data-bs-toggle="collapse" href="#lockersCollapse-{{$cupBoard->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                  </a>
                  <div class="collapse mt-2" id="lockersCollapse-{{$cupBoard->id}}">
                    <div class="card card-body">
                        {{-- foreach (lockers in cupboards) --}}
                        @foreach ($cupBoard->lockers as $locker)
                          <a href="anyPath/{{$locker->id}}">{{$locker->locker_number}}</a>
                        @endforeach
                        {{-- end foreach (lockers in cupboards) --}}
                    </div>
                  </div>
                </div>
            </div>
          </div>
        @endforeach
        {{-- end foreach (cupboards) --}}

    </div>

            
</div>

@endsection