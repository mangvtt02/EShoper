@extends('admin/index')
@section('mainContent')
<b><i>Danh sách sản phẩm</i></b>
<hr>

<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block" href="{{route('admin.insert_product')}}">
      <b class="mdi mdi-plus">Thêm Sản Phẩm</b>
    </a>
  </div>
  <br><br>

  <div class="row table-responsive">
    <table class="table table-bordered " id="product_table">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col" >Loại sản phẩm</th>
          <th scope="col" >Giá hiện tại</th>
          <th scope="col" >Khuyến mại ( % )</th>
          <th scope="col" >Đơn vị</th>
          <th scope="col" >Thao tác</th>
        
        </tr>
      </thead>
      <tbody>
        
    </tbody>
  </table>
  <script>
    $(function() {
        $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.data_product') !!}',
            columns: [
                { data: 'id', name: 'product.id' },
                { data: 'image', name: 'product.image', orderable: false, searchable: false },
                { data: 'name', name: 'product.name' },
                { data: 'name_tp', name: 'type_product.name' },
                { data: 'unit_price', name: 'product.unit_price' },
                { data: 'discount', name: 'product.discount' },
                { data: 'unit', name: 'product.unit',orderable: false, searchable: false },
                { data: 'action', name: 'action',orderable: false, searchable: false },
               
            ]
            
        });
    });
    </script>
    <script>
      $('#product_table').on('click','#delete_product',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
      });
    </script>
    </div>
    </div>

 @endsection

