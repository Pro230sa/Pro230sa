@extends('layouts.app')

@section('content')
<!--الكارد الي فيه حجوزاتي السابقه-->
<div class=r1"container">
    <div class="row justify-content-star">
        <div class="col-4">
            <div class="card-center">
                <div class="card-header"> </div>
                    <div class="card-body">
                        <label for="l1" class="form-label text-center"> num locker: </label>
                        <label for="ll1" class="form-label">...</label>
                        <br/>
                        <label for="l2" class="form-label"> الدور: </label>
                        <label for="ll2" class="form-label">...</label>
                        <br/>
                        <label for="l3" class="form-label"> الرسوم: </label>
                        <label for="ll3" class="form-label">...</label>
                        <br/>
                        <label for="l4" class="form-label"> المدة: </label>
                        <label for="ll4" class="form-label">...</label>
                        <br/>
                        <label for="l5" class="form-label"> الحالة: </label>
                        <label for="ll5" class="form-label">...</label>
                            </div>
                        </div>
                <!--</div>-->
                </div>
            </div>
            
            <!--القائمه الي على جنب-->
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
                <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                    <div class="collapse navbar-collapse ">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            <li class="nav-item">
                                <a class="nav-link pl-0 text-nowrap" href="/home"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">حجوزاتي</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0 text-nowrap" href="/companies"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">حجز الان </span></a>
                            </li>
                        </ul>
    </div>

@endsection