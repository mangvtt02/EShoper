@extends('admin/index')
@section('mainContent')
<b><i>Giới thiệu</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_about')}}">
      <b class="mdi mdi-plus">Thêm Nội Dung</b>
    </a>
  </div>
  <br><br>
  <div class="row table-responsive">
    <table class="table table-bordered " id="about_table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Trạng thái</th>
            <th scope="col" class="text-center">Thao tác</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <script>
        $(function() {
            $('#about_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.data_about') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image',orderable: false,searchable: false },
                    { data: 'title', name: 'title',orderable: false,searchable: false },
                    { data: 'content', name: 'content',orderable: false,searchable: false },
                    { data: 'status', name: 'status',orderable: false,searchable: false },
                    { data: 'action', name: 'action',orderable: false, searchable: false },
                ]
            });
        });
    </script>
    <script>
        $('#about_table').on('click','#delete_about',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
        });
    </script>
  </div>
</div>

 @endsection

