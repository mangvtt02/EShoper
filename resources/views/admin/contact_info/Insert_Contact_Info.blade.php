@extends('admin/index')
@section('mainContent')

<b><i>Thông tin liên hệ</i></b>
<hr>
<div class="container">
  {{-- errors --}}
@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $er)
      {{$er}}<br>
  @endforeach
</div>
@endif

{{-- success --}}

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
<form action="{{route('admin.post_insert_contact_info')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" >
    </div>
  </div>
  <div class="form-group row">
    <label for="tel" class="col-sm-2 col-form-label">Số điện thoại</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tel" id="tel">
    </div>
  </div>
  <div class="form-group row">
    <label for="fax" class="col-sm-2 col-form-label">Số fax</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fax" id="fax">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Thêm liên hệ</button>
    </div>
    <div class="col-sm-2 ">
      <a href="{{route('admin.list_contact_info')}}" class="btn btn-primary">Quay lại</a>
      </div>
  </div>
    
  </form>
</div>
@endsection
