@extends('admin/index')
@section('mainContent')
<h1><b style="width: 100%; display: block; text-align: center;">Danh sách màu sắc</b></h1>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_topping')}}">
      <b class="mdi mdi-plus">Thêm màu</b>
    </a>
  </div>
  <br><br>

  <div class="row table-responsive">
  <table class="table table-bordered" id="topping_table">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">Màu sắc</th>
          <th scope="col">Giá thay đổi</th>
          <th scope="col" >Trạng thái</th>
          <th scope="col" >Thao tác</th>
        
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script>
      $(function() {
          $('#topping_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.data_topping') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'price', name: 'price' },
                  { data: 'status', name: 'status',orderable: false,searchable: false },
                  { data: 'action', name: 'action',orderable: false, searchable: false },
              ]
          });
      });
      </script>
      <script>
        $('#topping_table').on('click','#delete_topping',function(){
          return confirm("Bạn có chắc chắn muốn xóa không?");
        });
      </script>
  </div>

</div>

 @endsection

