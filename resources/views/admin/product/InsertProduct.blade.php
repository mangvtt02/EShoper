@extends('admin/index')
@section('mainContent')

<b><i>Thêm sản phẩm</i></b>
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
<form action="{{route('admin.post_insert_product')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="image" class="col-sm-2 col-form-label">Ảnh</label>
    <div class="col-sm-10">
          
      <input type="file" class="form-control" id="image" name="image" >
     
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Tên sản phẩm</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" >
    </div>
  </div>
  <div class="form-group row">
    <label for="type_product" class="col-sm-2 col-form-label">Loại sản phẩm</label>
    <div class="col-sm-10">
      <select id="type_product" class="form-control" name="type_product">
        @foreach ($type_product as $tp)
        
      <option value="{{$tp->id}}">{{$tp->name}}</option>

        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
    <div class="col-sm-10">
      <div class="form-group">
          
      <textarea id="description" class="form-control" name="description" rows="15"></textarea>
          <script>CKEDITOR.replace('description');</script>
      </div>
    
  </div>
  </div>
  <div class="form-group row">
    <label for="unit_price" class="col-sm-2 col-form-label">Giá hiện tại</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="unit_price" name="unit_price" >
    </div>
  </div>
  <div class="form-group row">
    <label for="discount" class="col-sm-2 col-form-label">Phần trăm khuyến mại</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="discount" name="discount" >
    </div>
  </div>
  <div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">Đơn vị</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="unit" name="unit" >
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Trạng Thái</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked >
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
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('admin.list_product')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>
</div>
@endsection
