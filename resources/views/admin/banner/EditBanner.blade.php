@extends('admin/index')
@section('mainContent')

<b><i>Cập nhật banner</i></b>
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
<form action="{{route('admin.post_edit_banner',[$banner->id])}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" value="{{$banner->title}}">
    </div>
  </div>
    <div class="form-group row">
      <label for="image" class="col-sm-2 col-form-label">Ảnh</label>
      <div class="col-sm-10">
          
        <input type="file" class="form-control" id="image" name="image" value="{{$banner->image}}">
        <img src="assets/images/banner/{{$banner->image}}" alt="{{$banner->image}}" width="500" height="300">
      </div>
    </div>
    <div class="form-group row">
      <label for="slide" class="col-sm-2 col-form-label">Slide</label>
      <div class="col-sm-10">
        
        <input type="file" class="form-control" id="slide" name="slide" value="{{$banner->slide}}">
        <img src="assets/images/banner/{{$banner->slide}}" alt="{{$banner->slide}}" width="500" height="300">
      </div>
    </div>
    <div class="form-group row">
      <label for="link" class="col-sm-2 col-form-label">Link</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="link" name="link" value="{{$banner->link}}">
      </div>
    </div>
    
    
    
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Trạng Thái:</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status1" value="1" @if($banner->status == 'Hiện')
                checked
            @endif>
            <label class="form-check-label" for="status1">
              Hiện
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status2" value="0" @if($banner->status == 'Ẩn')
            checked
        @endif>
            <label class="form-check-label" for="status2">
              Ẩn
            </label>
          </div>
          
        </div>
      </div>
    </fieldset>
   
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Cập nhật banner</button>
      </div>
      <div class="col-sm-2">
        <a href="{{route('admin.list_banner')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>

</div>
@endsection
