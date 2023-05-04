@extends('admin/index')
@section('mainContent')


<b><i>Thay đổi mật khẩu</i></b>
<hr>
<div class="container">

{{-- success --}}

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
{{-- error --}}

@if (session('error'))
<div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
@endif
<form action="{{route('admin.post_change_passwd')}}" method="POST" enctype="multipart/form-data" style="width: 700px;" >
  @csrf
  
  
  <div class="form-group row">
    <label for="old_password" class="col-sm-2 col-form-label">Mật khẩu cũ</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="old_password" name="old_password" >
     </div>
  </div>
  <div class="form-group row">
    <label for="new_password" class="col-sm-2 col-form-label">Mật khẩu mới</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="new_password" name="new_password" >
     </div>
  </div>
  
   
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('admin.home')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>
</div>
@endsection
