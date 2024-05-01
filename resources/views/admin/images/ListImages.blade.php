@extends('admin/index')
@section('mainContent')
<b><i>Danh sách ảnh</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_images')}}">
      <b class="mdi mdi-plus">Thêm Ảnh</b>
    </a>
  </div>
  <br><br>
<div class="row table-responsive">
  <table class="table table-bordered " id="image_table">
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Đường dẫn</th>
        <th scope="col" >Vị trí xuất hiện</th>
        <th scope="col" >Thao tác</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <script>
    $(function() {
        $('#image_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.data_image') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name',orderable: false,searchable: false },
                { data: 'link', name: 'link',orderable: false,searchable: false },
                { data: 'priority', name: 'priority' },
                { data: 'action', name: 'action',orderable: false, searchable: false },
            ]
        });
    });
    </script>
    <script>
      $('#image_table').on('click','#delete_image',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
      });
    </script>
</div>
</div>

 @endsection

