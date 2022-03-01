@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-sm-2">
            <a href="/companies/create" class="btn btn-success">إضافة شركة</a>

        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>
        </div>
        <div class="col-sm-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>

        </div>
        <div class="col-sm-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">اسم الشركة</th>
        <th scope="col">المدينة</th>
        <th scope="col">عدد الفروع</th>
        <th scope="col">الإجراءات</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->city}}</td>
                <td>{{$company->branches_count}}</td>
                <td>
                    <a href="/companies/{{$company->id}}/edit" class="btn btn-secondary">تعديل</a>
                    <form action="/companies/{{$company->id}}/destroy" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">حذف</button>

                    </form>
                </td>
            </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection


@section('script')
<script>
    function confirmDelete() {
        if (confirm("هل أنت متأكد من حذف الشركة؟")) {
            return true;
        }
        return false;
    }
</script>
@endsection