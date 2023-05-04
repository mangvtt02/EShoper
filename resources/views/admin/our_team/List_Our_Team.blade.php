@extends('admin/index')
@section('mainContent')
<b><i>Đội Ngũ</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_our_team')}}">
      <b class="mdi mdi-plus">Thêm Thành Viên</b>
    </a>
  </div>
  <br><br>
  <div class="row table-responsive">
    <table class="table table-bordered " id="our_team_table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col">Chức vụ</th>
            <th scope="col">Giới thiệu</th>
            <th scope="col" class="text-center">Thao tác</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <script>
        $(function() {
            $('#our_team_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.data_our_team') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image',orderable: false,searchable: false },
                    { data: 'name', name: 'name',orderable: false,searchable: false },
                    { data: 'position', name: 'position',orderable: false,searchable: false },
                    { data: 'introduce', name: 'introduce',orderable: false,searchable: false },
                    { data: 'action', name: 'action',orderable: false, searchable: false },
                ]
            });
        });
    </script>
    <script>
        $('#our_team_table').on('click','#delete_our_team',function(){
        return confirm("Bạn có chắc chắn muốn xóa không?");
        });
    </script>
  </div>
</div>

 @endsection

