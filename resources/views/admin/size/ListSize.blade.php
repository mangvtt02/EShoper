@extends('admin/index')
@section('mainContent')
<h1><b style="width: 100%; display: block; text-align: center;">Danh sách size</b></h1>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_size')}}">
      <b class="mdi mdi-plus">Thêm Size</b>
    </a>
  </div>
  <br><br>

<div class="row table-responsive">
  <table class="table table-bordered" id="size_table" >
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">Tên size</th>
          <th scope="col">Độ to (%)</th>
          <th scope="col" >Trạng thái</th>
          <th scope="col">Thao tác</th>
        
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script>
      $(function() {
          $('#size_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.data_size') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'percent', name: 'percent' },
                  { data: 'status', name: 'status',orderable: false,searchable: false },
                  { data: 'action', name: 'action',orderable: false, searchable: false },
              ]
          });
      });
      </script>
      <script>
        $('#size_table').on('click','#delete_size',function(){
          return confirm("Bạn có chắc chắn muốn xóa không?");
        });
      </script>
</div>
</div>

 @endsection

