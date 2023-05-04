@extends('admin/index')
@section('mainContent')
<b><i>Danh sách loại sản phẩm</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block" href="{{route('admin.insert_type_product')}}">
      <b class="mdi mdi-plus">Thêm Loại Sản Phẩm</b>
    </a>
  </div>
  <br><br>
  <div class="row table-responsive">
  <table class="table table-bordered " id="type_product_table">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">Tên loại sản phẩm</th>
          <th scope="col">Banner loại</th>
          <th scope="col" >Phân loại</th>
          <th scope="col" >Trạng thái</th>
          <th scope="col" >Thao tác</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script>
      $(function() {
          $('#type_product_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.data_type_product') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'banner_type', name: 'banner_type', orderable: false, searchable: false },
                  { data: 'new', name: 'new',orderable: false },
                  { data: 'status', name: 'status',orderable: false },
                  { data: 'action', name: 'action',orderable: false, searchable: false },
              ]
              
          });
      });
      </script>
      <script>
        $('#type_product_table').on('click','#delete_type_product',function(){
          return confirm("Bạn có chắc chắn muốn xóa không?");
        });
      </script>
    </div>
</div>

 @endsection

