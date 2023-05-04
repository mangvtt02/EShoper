@extends('admin/index')
@section('mainContent')
<b><i>Các iên hệ đã nhận</i></b>
<hr>
<div class="container">
    <div class="row table-responsive">
        <table class="table table-bordered " id="contact_table">
            <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Tên người liên hệ</th>
                <th scope="col" >Email</th>
                <th scope="col" >Nội dung liên hệ</th>
                <th scope="col" >Thao tác</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <script>
            $(function() {
                $('#contact_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.data_contact') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name',orderable: false,searchable: false },
                        { data: 'email', name: 'email',orderable: false,searchable: false },
                        { data: 'messages', name: 'messages',orderable: false,searchable: false },
                        { data: 'action', name: 'action',orderable: false, searchable: false },
                    ]
                });
            });
        </script>
        <script>
            $('#contact_table').on('click','#delete_contact',function(){
            return confirm("Bạn có chắc chắn muốn xóa không?");
            });
        </script>
    </div>
</div>
 @endsection

