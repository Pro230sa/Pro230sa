@extends('layouts.app')

@section('content')
<!--الكارد الي فيه حجوزاتي السابقه-->
<div class="container">
    <div class="card">
        <div class="card-header">
          Featured
        </div>
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
@endsection