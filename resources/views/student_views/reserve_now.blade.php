@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if($reservation_time && $reservation_time->status && Auth::user()->can_reserve)
      <div class="row">
          {{-- foreach (cupboards) --}}
          @foreach ($cupBoards as $cupBoard)
            @if($cupBoard->available_lockers->count() > 0)
              <div class="col-6 mt-6">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$cupBoard->number}}</h5>
                      <p class="card-text">Bulding Name: {{$cupBoard->building_name}}</p>
                      <p class="card-text">Floor Number: {{$cupBoard->floor_number}}</p>

                      <a class="btn btn-primary" data-bs-toggle="collapse" href="#lockersCollapse-{{$cupBoard->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                        To reserve locker
                      </a>
                      <div class="collapse mt-2" id="lockersCollapse-{{$cupBoard->id}}">
                        <div class="card card-body">
                            {{-- foreach (lockers in cupboards) --}}
                            @foreach ($cupBoard->available_lockers as $locker)
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-sm-3 p-0">
                                    <a class="reserveNowBtn btn btn-outline-primary my-1" data-locker-number="{{$locker->locker_number}}" data-locker-id="{{$locker->id}}" data-bs-toggle="modal" href="#toggleReserveNowModal" role="button">{{$locker->locker_number}}</a>
                                  </div>
                                </div>
                              </div>
                              {{-- <a href="anyPath/{{$locker->id}}">{{$locker->locker_number}}</a> --}}
                            @endforeach
                            {{-- end foreach (lockers in cupboards) --}}
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            @endif
          @endforeach
          {{-- end foreach (cupboards) --}}

          <div class="modal fade" id="toggleReserveNowModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel">Reserve Locker: <span id="lockerNumber"></span></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam possimus iste exercitationem. Natus fugit ea ipsum porro consectetur. Qui corrupti exercitationem id, magni recusandae dolores quidem vel debitis eos nihil!
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus iusto, corporis vel mollitia sint odio corrupti iure est laudantium, dolores a nam autem tempore quis hic, voluptas quia ullam optio!
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe reprehenderit officia, rem sunt libero blanditiis mollitia, laborum molestias ea quae unde repudiandae inventore repellat ipsam esse voluptas quod, autem ab!
                  <div class="container-fluid">
                    <form class="row" id="modalForm" action="#" method="post">
                      @csrf
                      <input type="hidden" name="reservation_time_id" value={{$reservation_time->id}}>
                      <div class="col-sm-12 form-check">
                        <input type="checkbox" name="terms_conditions" class="form-check-input" required>
                        <label class="form-check-label">Accept Terms & Conditions</label>
                      </div>
                      <div class="col-sm-12">
                        <div class="container-fluid">
                          <div class="row justify-content-end">
                            <div class="col-sm-2 p-0 text-end">
                              <button type="submit" class="btn btn-success">Reserve</button>
                            </div>
                          </div>
                      </div>
                        
                      </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>

      </div>
    @else
      <h4>No Reservation Available</h4>
    @endif
            
</div>

@endsection

@section('script')
    <script>
      $(document).ready(function () {
          $(".reserveNowBtn").click(function () {
            let locker_number = $(this).data('locker-number');
            let locker_id = $(this).data('locker-id');
            $('#toggleReserveNowModal #lockerNumber').html(locker_number);
            $('#toggleReserveNowModal #modalForm').attr('action', `reserve_now/${locker_id}`);
          });
      });


    </script>
@endsection