@extends('admin/index')
@section('mainContent')

<b><i>Thêm loại sản phẩm</i></b>
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

<form action="{{route('admin.post_insert_type_product')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Tên loại sản phẩm</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" >
    </div>
  </div>
  <div class="form-group row">
    <label for="banner_type" class="col-sm-2 col-form-label">Banner loại</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="banner_type" name="banner_type" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="new" class="col-sm-2 col-form-label">Phân loại</label>
    <div class="col-sm-10">
      <select id="new" class="form-control" name="new">
        <option value="1">Đồ ăn</option>
        <option value="2">Đồ uống</option>
      </select>
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
        <button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
      </div>
      <div class="col-sm-2">
        <a href="{{route('admin.list_type_product')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>
</div>
@endsection
