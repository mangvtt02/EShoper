@extends('admin/index')
@section('mainContent')
<b><i>Danh sách đánh giá</i></b>
<hr>
<div class="container">
<div class="row table-responsive">
<table class="table table-bordered" id="review_table" >
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col" >Tiêu đề đánh giá</th>
        <th scope="col" >Nội dung đánh giá</th>
        <th scope="col" >Số sao đánh giá</th>
        <th scope="col" >Thao tác</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <script>
    $(function() {
        $('#review_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.data_review') !!}',
            columns: [
                { data: 'id', name: 'comment.id' },
                { data: 'name', name: 'users.name', orderable: false },
                { data: 'name_pr', name: 'product.name',orderable: false },
                { data: 'title', name: 'comment.title',orderable: false },
                { data: 'content', name: 'comment.content',orderable: false },
                { data: 'number_star', name: 'comment.number_star' },
                { data: 'action', name: 'action',orderable: false, searchable: false },
            ]
        });
    });
    </script>
    <script>
      $('#review_table').on('click','#delete_review',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
      });
    </script>
    </div>
</div>

 @endsection

