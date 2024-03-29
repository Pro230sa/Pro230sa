@extends('layouts.app')
<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
    Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

.main-container {
  padding: 30px;
}

/* HEADING */

.heading {
  text-align: center;
}

.heading__title {
  font-weight: 600;
}

.heading__credits {
  margin: 10px 0px;
  color: #888888;
  font-size: 25px;
  transition: all 0.5s;
}

.heading__link {
  text-decoration: none;
}

.heading__credits .heading__link {
  color: inherit;
}

/* CARDS */

.cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  margin: 20px;
  padding: 20px;
  width: 500px;
  min-height: 200px;
  display: grid;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}

.card__link,
.card__exit,
.card__icon {
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.9);
}

.card__link::after {
  position: absolute;
  top: 25px;
  left: 0;
  content: "";
  width: 0%;
  height: 3px;
  background-color: rgba(255, 255, 255, 0.6);
  transition: all 0.5s;
}

.card__link:hover::after {
  width: 100%;
}


.card__title {
  grid-row: 3/4;
  font-weight: 400;
  color: #ffffff;
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
}

/* CARD BACKGROUNDS */

.card {
  background: linear-gradient(90deg, rgba(148,187,233,1) 0%, rgba(240,248,255,1) 0%);
}
}


/* RESPONSIVE */

@media (max-width: 1600px) {
  .cards {
    justify-content: center;
  }
}
.text{color:rgb(42, 147, 176)}
</style>
@section('content')
<div class="container-fluid">
    @if($reservation_time && $reservation_time->status && Auth::user()->can_reserve)
      <div class="row">
          {{-- foreach (cupboards) --}}
          @foreach ($cupBoards as $cupBoard)
            @if($cupBoard->available_lockers->count() > 0)
              <div class="col-6 mt-6">
                <div class="card">
                    <div class="card-body">
                      <h2 class="card-title"><b class="text ">{{$cupBoard->number}}</b></h2>
                      <hp class="card-text"><b>Bulding Name:</b>&nbsp {{$cupBoard->building_name}}.</p>
                      <p class="card-text"><b>Floor Number:</b>&nbsp{{$cupBoard->floor_number}}.</p>

                      <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#lockersCollapse-{{$cupBoard->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                  <h5 class="modal-title" id="exampleModalToggleLabel">Reserve Locker : <span id="lockerNumber"></span></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul>
                    <li> <b> The Fee for reservation is: {{$reservation_time->locker_fee}} SAR </b> </li>
                  </ul>
                  <ul>
                  <li> Lockers are rented every the semester. </li>
                  <li> Priority in renting lockers is for those who apply first. </li>
                  <li> The lease term ends when the student graduates. </li>
                  <li> It is not possible to rent more than one locker only. </li>
                  <li> When renting a locker, the student must pay a fee. </li>
                  <li> The student must empty the rented locker of its contents, clean it at the end of the rental period, and hand over the key to the Student Affairs Office within the specified time. If this is not done, the university will remove its contents within 24 hours of the end of the period. </li>
                  <li> It is prohibited to store any perishable, flammable, or explosive materials in the closet, and the seizure of any of these materials inside will result in the termination of the lease. </li>
                  <li> It is prohibited to store prohibited materials and weapons of any kind in the safe, and the seizure of any of these materials inside may result in disciplinary action. </li>
                  <li> The university is not responsible for any lost items in the locker. </li>
                  <li> The university has the right to search safes when it deems it necessary. </li>
                  <li> The university has the right to terminate the lease in case of misuse. </li>
                  

                  </ul>

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