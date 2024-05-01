@extends('admin/index')
@section('mainContent')
<b><i>Thông tin liên hệ</i></b>
<hr>
<div class="container">
  <div class="row">
    <a  class="btn btn-primary btn-lg btn-block " href="{{route('admin.insert_contact_info')}}">
      <b class="mdi mdi-plus">Thêm liên hệ</b>
    </a>
  </div>
  <br><br>
  <div class="row table-responsive">
    <table class="table table-bordered " id="contact_info_table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Số fax</th>
          <th scope="col">Email</th>
          <th scope="col"  class="text-center">Thao tác</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script>
      $(function() {
          $('#contact_info_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.data_contact_info') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'address', name: 'address',orderable: false,searchable: false },
                  { data: 'tel', name: 'tel',orderable: false,searchable: false },
                  { data: 'fax', name: 'fax',orderable: false,searchable: false },
                  { data: 'email', name: 'email',orderable: false,searchable: false },
                  { data: 'action', name: 'action',orderable: false, searchable: false },
              ]
          });
      });
      </script>
      <script>
        $('#contact_info_table').on('click','#delete_contact_info',function(){
          return confirm("Bạn có chắc chắn muốn xóa không?");
        });
      </script>
  </div>
</div>

 @endsection

