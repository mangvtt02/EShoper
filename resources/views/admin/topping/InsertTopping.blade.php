@extends('admin/index')
@section('mainContent')

<b><i>Thêm topping</i></b>
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

<form action="{{route('admin.post_insert_topping')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Tên topping</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Giá topping</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" >
     </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Trạng Thái</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
          <label class="form-check-label" for="status1">
            Hiện
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status2" value="0" >
          <label class="form-check-label" for="status2">
            Ẩn
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>
   
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Thêm topping</button>
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('admin.list_topping')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>
</div>
@endsection
