@extends('admin/index')
@section('mainContent')

<b><i>Cập nhật thông tin</i></b>
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
<form action="{{route('admin.post_face')}}" method="POST" enctype="multipart/form-data" style="width: 700px;" >
  @csrf
  <div class="form-group row">
    <label for="image" class="col-sm-2 col-form-label">Ảnh đại diện</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="image" name="image" value="{{Auth::user()->image}}">
      <img src="assets/images/user/{{Auth::user()->image}}" alt="{{Auth::user()->image}}" >
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
  </div>
  <hr>
</form>

<form action="{{route('admin.post_info')}}" method="POST" enctype="multipart/form-data" style="width: 700px;" >
  @csrf
  
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Họ và tên</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="SDT" class="col-sm-2 col-form-label">Số điện thoại</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="SDT" name="SDT" value="{{Auth::user()->SDT}}">
     </div>
  </div>
  <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="status1" value="1" @if(Auth::user()->gender == 'nam')
          checked
      @endif>
          <label class="form-check-label" for="status1">
            Nam
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="status2" value="0" @if(Auth::user()->gender == 'nữ')
          checked
      @endif>
          <label class="form-check-label" for="status2">
            Nữ
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>
   
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('admin.home')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
    
  </form>
</div>
@endsection
