@extends('admin/index')
@section('mainContent')
<b><i>Danh sách blogs</i></b>
<hr>
<div class="container">
   <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_blog')}}">
      <b class="mdi mdi-plus">Thêm Blog</b>
    </a>
  </div><br><br>
  
    <div class="row table-responsive">
      <table class="table table-bordered " id="blog_table">
          <thead>
            <tr class="text-center">
              <th scope="col">ID</th>
              <th scope="col">Ảnh</th>
              <th scope="col">Tiêu Đề</th>
              <th scope="col" >Thao tác</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          </table>
          <script>
            $(function() {
                $('#blog_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.data_blog') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'image', name: 'image', orderable: false, searchable: false },
                        { data: 'title', name: 'title' },
                        { data: 'action', name: 'action',orderable: false, searchable: false },
                    ]
                    
                });
            });
            </script>
            <script>
              $('#blog_table').on('click','#delete_blog',function(){
                return confirm("Bạn có chắc chắn muốn xóa không?");
              });
            </script>
      </div>
</div>

 @endsection

