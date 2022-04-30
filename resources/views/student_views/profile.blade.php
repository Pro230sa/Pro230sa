@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('profile') }}" autocomplete="off">
                @csrf


                <h6 class="heading-small text-muted mb-4">User Information</h6>

                <div class="pl-lg-4">
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Email</label>
                                <input type="text" class="form-control" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Phone Number<span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $user->phone_number) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Department<span class="small text-danger">*</span></label>
                                <input type="text" class="form-control" name="department" placeholder="Department" value="{{ old('department', $user->department) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Old Password<span class="small text-danger">*</span></label>
                                <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Password<span class="small text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    
                </div>

                <!-- Button -->
                <div class="pl-lg-4 mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection