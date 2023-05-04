@extends('admin/index')
@section('mainContent')


<b><i>Cập nhật blogs</i></b>
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
  <form action="{{route('admin.post_edit_blog',[$blog->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="image" class="col-sm-2 col-form-label">Ảnh</label>
      <div class="col-sm-10">
          
        <input type="file" class="form-control" id="image" name="image" >
        <img src="assets/images/blog/{{$blog->image}}" alt="{{$blog->image}}" height="300">
      </div>
    </div>
    <div class="form-group row">
      <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
      </div>
    </div>
      
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
        <div class="col-sm-10">
            
          <textarea id="description" class="form-control" name="description" rows="15"  >
              {{$blog->description}}
          </textarea>
              <script>CKEDITOR.replace('description');</script>
        </div>
      </div>
      <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">Nội dung</label>
        <div class="col-sm-10">
          <textarea id="content" class="form-control" name="content" rows="15" >
              {{$blog->content}}
          </textarea>
              <script>CKEDITOR.replace('content');</script>
        </div>
      </div>
      <div class="form-group row">
          <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Cập nhật blogs</button>
            </div>
            <div class="col-sm-2">
              <a href="{{route('admin.list_blog')}}" class="btn btn-primary">Quay lại</a>
              </div>
      </div>
    </form>
</div>
@endsection
