@extends('admin/index')
@section('mainContent')

<b><i>Cập nhật ảnh</i></b>
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
<form action="{{route('admin.post_edit_images',$images->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Ảnh</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" id="name" name="name" value="{{$images->name}}">
    <img src="assets/images/images/{{$images->name}}" alt="{{$images->name}}" style="width: 500px; height: 300px;" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="link" class="col-sm-2 col-form-label">Đường dẫn</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="link" name="link" value="{{$images->link}}">
     </div>
  </div>
  <div class="form-group row">
    <label for="link" class="col-sm-2 col-form-label">Vị trí</label>
    <div class="col-sm-10">
      <select name="priority" id="priority">
        <option value="1" @if ($images->priority == 'Vị trí 1')
            selected
        @endif>Vị trí 1</option>
        <option value="2" @if ($images->priority == 'Vị trí 2')
          selected
      @endif>Vị trí 2</option>
        <option value="3" @if ($images->priority == 'Vị trí 3')
          selected
      @endif>Vị trí 3</option>
        <option value="4" @if ($images->priority == 'Vị trí 4')
          selected
      @endif>Vị trí 4</option>
       
      </select>
     
     </div>
  </div>

  
   
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Cập nhật ảnh</button>
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('admin.list_images')}}" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    
  </form>

</div>
@endsection
