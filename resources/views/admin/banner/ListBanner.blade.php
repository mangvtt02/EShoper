@extends('admin/index')
@section('mainContent')
<!-- CSS -->
<b><i>Danh sách banner</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_banner')}}">
      <b class="mdi mdi-plus">Thêm Banner</b>
    </a>
  </div>
  <br><br>
  <div class="row table-responsive">
    
  <table class="table table-bordered text-center" id="banner_table" >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Slide</th>
          <th scope="col">Đường Dẫn</th>
          <th scope="col">Tiêu đề</th>
          <th scope="col">Trạng thái</th>
          <th scope="col" >Thao tác</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
  </table>
  <script>
    $(function() {
        $('#banner_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.data_banner') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image',orderable: false,searchable: false },
                { data: 'slide', name: 'slide',orderable: false,searchable: false },
                { data: 'link', name: 'link',orderable: false,searchable: false },
                { data: 'title', name: 'title',orderable: false },
                { data: 'status', name: 'status',orderable: false,searchable: false },
                { data: 'action', name: 'action',orderable: false, searchable: false },
            ]
        });
    });
    </script>
    <script>
      $('#banner_table').on('click','#delete_banner',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
      });
    </script>
  </div>
</div>

@endsection
