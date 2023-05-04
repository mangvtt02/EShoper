@extends('admin/index')
@section('mainContent')

<h1 class="text-center"><strong ><i>Liệt kê đơn hàng</i></strong></h1>
<hr>
<div class="container">
    <div class="row table-responsive">
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
                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <p>Địa chỉ giao hàng: &nbsp;<b>{{$or->customers->address}}</b></p>
                              <p>Phương thức thanh toán: &nbsp;<b>{{$or->payment}}</b></p>
                              <p>Điện thoại: &nbsp;<b>{{$or->customers->phone_nb}}</b></p>
                            </div>
                            <div class="row">
                              <p>Phí ship: &nbsp;<b>{{number_format(20000)}}đ</b></p>

                            </div>

                              <table class="row table table-responsive">
                                <tr>
                                  <th>Sản phẩm</th>
                                  <th>Size</th>
                                  <th>Topping</th>
                                  <th>Số lượng</th>
                                  <th>Giá bán</th>
                                </tr>
                                @foreach ($or->order_detail as $item)
                                <tr>
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
                  <td>
                      <a @if ($or->status == 1)
                        href="{{route('admin.delete_order',[$or->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                      @endif >
                          <i class="mdi mdi-delete-variant"></i>
                          Xóa
                      </a>
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
 @endsection

