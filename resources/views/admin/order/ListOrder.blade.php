@extends('admin/index')
@section('mainContent')

<script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js
"></script>
<h1 class="text-center"><strong>Liệt kê đơn hàng</strong></h1>
<hr>
<div class="container">
    <div class="row table-responsive" style="height: 470px">
      <table class="table table-bordered " >
        
          <thead>
            <tr class="text-center">
              <th scope="col">ID</th>
              <th scope="col">Tên khách hàng</th>
              <th scope="col">Ghi chú</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Ngày tạo</th>
              <th scope="col">Trạng thái</th>
              <th scope="col" colspan="4">Thao tác</th>
            </tr>
          </thead>
            <tbody>
              @foreach ($order as $or)
              
              <tr class="text-center">
              <th scope="row">{{$or->id}}</th>
                  <td>
                    {{$or->customers->name}}
                  </td>
                  <td>{{$or->note}}</td>
                  <td>{{number_format($or->total)}}đ</td>
                  <td>{{$or->created_at}}</td>
                  <td>
                    @if ($or->status == 0)
                      <b class="btn btn-danger">Chờ xử lý</b>
                    @else
                      <b class="btn btn-success">Đã duyệt</b>
                    @endif
                  </td>
                  <td>
                    @if ($or->status == 1)
                      <b class="btn btn-secondary"><a style="text-decoration: none;" target="_blank" href="{{route('admin.print_order',$or->id)}}">In hóa đơn</a> </b>
                    @else
                      <b class="btn btn-secondary"><a style="text-decoration: none;">In hóa đơn</a> </b>
                    @endif
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$or->id}}">
                      Xem chi tiết
                    </button>
                    <div class="modal fade" id="exampleModal_{{$or->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title" style="margin: auto; width:100%" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <p>Địa chỉ giao hàng: &nbsp;<b>{{$or->customers->address}}</b></p>
                              <p>Phương thức thanh toán: &nbsp;<b>{{$or->payment}}</b></p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                              <p>Số điện thoại: &nbsp;<b>{{$or->customers->phone_nb}}</b></p>
                            </div>
                            <div class="row">
                              <p>Phí ship: &nbsp;<b>{{number_format(20000)}}đ</b></p>

                            </div>

                              <table class="row table table-responsive">
                                <tr>
<<<<<<< HEAD
                                  <td>STT</td>
                                  <th>Sản phẩm</th>
                                  <th>Size</th>
                                  <th>Màu sắc</th>
                                  <th>Số lượng</th>
                                  <th>Giá bán</th>
                                </tr>
                                @php $count = 1; @endphp <!-- Khởi tạo biến đếm -->
                                @foreach ($or->order_detail as $item)
                                <tr>
                                    <td>{{$count++}}</td>
=======
                                  <th>Sản phẩm</th>
                                  <th>Size</th>
                                  <th>Topping</th>
                                  <th>Số lượng</th>
                                  <th>Giá bán</th>
                                </tr>
                                @foreach ($or->order_detail as $item)
                                <tr>
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->size->name}}</td>
                                    @if ($item->topping != null)
                                      <td>{{$item->topping->name}}</td>
                                    @else
                                      <td> null</td>
                                    @endif
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price)}}</td>
                                </tr>
                                @endforeach
                              </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    @if ($or->status == 0)
                      <a class="btn btn-danger" href="{{route('admin.confirm',[$or->id])}}">Chốt đơn</a>
                    @else
                      <b class="btn btn-success">Đã duyệt</b>
                    @endif
                  </td>
              </tr>
              @endforeach
          </tbody>
          </table>
      </div>
      <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination">
          {!!$order->render()!!}
        </ul>
      </nav>
</div>

<canvas id="revenueChart" width="800" height="400"></canvas>
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var months = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
    var revenueData = Array(12).fill(0); // Tạo mảng 12 phần tử với giá trị ban đầu là 0
    
    // Tính tổng doanh thu cho từng tháng
    @foreach ($order as $or)
        var orderMonth = new Date("{{$or->created_at}}").getMonth();
        var orderYear = new Date("{{$or->created_at}}").getFullYear();
        revenueData[orderMonth] += parseInt("{{$or->total}}");
    @endforeach
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Doanh thu theo tháng',
                data: revenueData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection
