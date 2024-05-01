@extends('admin/index')
@section('mainContent')

<b><i>Đội Ngũ</i></b>
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
<form action="{{route('admin.post_insert_our_team')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="image" class="col-sm-2 col-form-label">Ảnh</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="image" name="image" >
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name">
    </div>
  </div>
  <div class="form-group row">
    <label for="position" class="col-sm-2 col-form-label">Chức vụ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="position" id="position">
    </div>
  </div>
  <div class="form-group row">
    <label for="introduce" class="col-sm-2 col-form-label">Giới thiệu</label>
    <div class="col-sm-10">
      <div class="form-group">
        <textarea id="introduce" class="form-control" name="introduce" rows="15"></textarea>
        <script>CKEDITOR.replace('introduce');</script>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Thêm thành viên</button>
    </div>
    <div class="col-sm-2 ">
      <a href="{{route('admin.list_our_team')}}" class="btn btn-primary">Quay lại</a>
      </div>
  </div>
    
  </form>
</div>
@endsection
