@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form class="row" method="post" action="/companies/{{$company->id}}">
        @csrf
        <div class="col-sm-6 mb-3">
          <label class="form-label">اسم الشركة</label>
          <input type="text"class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name) }}" >
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-6 mb-3">
          <label class="form-label">المدينة</label>
          <input type="text" name="city"class="form-control" value="{{ old('city', $company->city) }}">
        </div>
        <div class="col-sm-6 mb-3">
            <label class="form-label">عدد الفروع</label>
            <input type="number" name="branches_count" class="form-control" value="{{ old('branches_count', $company->branches_count) }}">
        </div>

        <div class="col-sm-3 mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection