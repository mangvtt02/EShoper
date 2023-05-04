@extends('admin/index')
@section('mainContent')
<b><i>Danh sách đánh giá</i></b>
<hr>
<div class="container">
<div class="row table-responsive">
<table class="table table-bordered " id="cmt_blog_table">
    <thead>
      <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col" >Bình luận</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <script>
    $(function() {
        $('#cmt_blog_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.data_cmt') !!}',
            columns: [
                { data: 'id', name: 'Comment_blogs.id' },
                { data: 'name', name: 'users.name', orderable: false },
                { data: 'title', name: 'blog.title',orderable: false },
                { data: 'comment', name: 'Comment_blogs.comment',orderable: false },
                { data: 'action', name: 'action',orderable: false, searchable: false },
            ]
        });
    });
    </script>
    <script>
      $('#cmt_blog_table').on('click','#delete_cmt_blog',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
      });
    </script>
    </div>
</div>

 @endsection

