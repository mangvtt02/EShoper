@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')
<style>
@media only screen and (max-width: 540px) {
  .res {
    width: 400px !important;
  }
}

</style>
<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="heading-content">
				<div class="heading-wrapper">
					<div class="container">
						<div class="row">
							<div class="page-heading-inner heading-group">
								<div class="breadcrumb-group">
									<h1 class="hidden">Tài khoản của tôi</h1>
									<div class="breadcrumb clearfix">
										<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title">Trang chủ</span></a>
										</span>
										<span class="arrow-space"></span>
										<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
											<a href="{{route('page.get_info')}}" title="Tài khoản của tôi" itemprop="url"><span itemprop="title">Tài khoản của tôi</span></a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="account-layout">
				<div class="account-wrapper">
					<div class="container">
						<div class="row">
							<div class="account-inner">
								<div class="account-content">
									<div class="account-info">
										<div class="account-details col-sm-6">
											<h3 class="details-title">Thông tin chi tiết</h3>
											<div class="details-content">
												<div class="details-item name">
													<span class="title">Họ và tên:</span>
													<span class="content">{{$user->name}}</span>
												</div>
												<div class="details-item">
													<span class="title">E-mail:</span>
													<span class="content">{{$user->email}}</span>
												</div>
												<div class="details-item">
													<span class="title">Địa chỉ:</span>
													<address class="content">{{$user->address}}</address>
												</div>
												<div class="details-item">
													<span class="title">Điện thoại:</span>
													<a class="content" href="tel:{{$user->SDT}}">{{$user->SDT}}</a>
												</div>
                        <div class="item logout-item" style="font-weight: bold; border: solid 1px #000; padding: 10px; width: 108px; border-radius: 10px;">
                        <style>
                           .logout-item:hover {
                            background: #000;
                           }
                          .logout-item:hover > a {
                            color: #ffffff !important;
                          }
                        </style>
														<a href="{{route('page.Logout')}}" @if(is_countable($cart->items) && count($cart->items)>0)
																	onclick="return confirm('Khi đăng xuất các sản phẩm trong giỏ hàng sẽ bị mất?')"
																@endif >ĐĂNG XUẤT</a>
                        </div>
											</div>
										</div>
										<div class="account-banner col-sm-6">
											<a href="#"><img src="assets/images/account_banner_1.jpg" alt=""></a>
										</div>
										<div class="account-banner col-sm-6">
											<a href="#"><img src="assets/images/account_banner_2.jpg" alt=""></a>
										</div>
									</div>
									<div class="account-orders">
										<div class="account-orders-inner">
											<table>
												<thead>
													<tr>
														<th class="order_number">Mã đơn</th>
														<th class="date">Ngày</th>
														<th class="payment_status">Loại thanh toán</th>
														<th class="fulfillment_status">Tình trạng</th>
														<th class="total">Tổng tiền</th>
													</tr>
												</thead>
												<tbody>
                          
                        @foreach($order as $or)
                        
                          @if($or->customers->email === $email_customer->email)
                          
                            <tr class="odd cancelled_order">
                              <td class="td-name">#{{$or->id}}</td>
                              <td class="td-note"><span class="note">{{$or->created_at}}</span></td>
                              <td class="td-authorized"><span class="status_voided">{{$or->payment}}</span></td>
                            
                            @if($or->status == 1)
                              <td class="td-unfulfilled"><span class="status_unfulfilled"> Hoàn thành</span></td>
                            @else
                              <td class="td-unfulfilled"><span class="status_unfulfilled"> Chưa hoàn thành</span></td>
                            @endif
                              
                              <td class="td-total"><span class="total"><span class="money" >{{number_format($or->total)}}đ</span></span>
                              </td>
                            </tr>
                           @endif
                        @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
              {{-- errors --}}
              @if (count($errors)>0)
              <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $er)
                    {{$er}}<br>
                @endforeach
              </div>
              @endif
              {{-- success --}}
              
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{session('success')}}
              </div>
              @endif
              {{-- errors --}}
              @if (session('error'))
              <div class="alert alert-danger" role="alert">
                {{session('error')}}
              </div>
              @endif

              <b><i>Cập nhật ảnh đại diện</i></b>
              <hr>
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
              
              <form action="{{route('page.post_face')}}" class="col-sm-6 res" method="POST" enctype="multipart/form-data" style="width: 600px;" >
                @csrf
                
                
                <div class="form-group row">
                  <label for="image" class="col-sm-3 col-form-label">Ảnh đại diện</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="image" name="image" value="{{$user->image}}">
                    <img src="assets/images/user/{{$user->image}}" alt="{{$user->image}}" >
                  </div>
                </div>
                
                
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                  </div>
                  
              </form>
                
            </div>
            <div class="row">
            
              <b><i>Cập nhật thông tin</i></b>
              <hr>
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              
              
              <form class="col-sm-6 res" action="{{route('page.post_info')}}" method="POST" enctype="multipart/form-data" style="width: 600px;" >
                @csrf
              
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Họ và tên</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                  </div>
                </div>
                
                
                <div class="form-group row">
                  <label for="SDT" class="col-sm-3 col-form-label">Số điện thoại</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="SDT" name="SDT" value="{{$user->SDT}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-3 pt-0">Giới tính</legend>
                    <div class="col-sm-9">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="status1" value="1" @if($user->gender == 'nam')
                        checked
                    @endif><label class="form-check-label" for="status1">Nam</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="status2" value="0" @if($user->gender == 'nữ')
                        checked
                    @endif>
                        <label class="form-check-label" for="status2">
                          Nữ
                        </label>
                      </div>
                      
                    </div>
                  </div>
                </fieldset>
                
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                  
                  </div>
                  
                </form>
              
            </div>

            </div>
            <div class="row">
              <br><br>
              <b><i>Thay đổi mật khẩu</i></b>
              <hr>
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
              
                <form action="{{route('page.post_change_passwd')}}" class="col-sm-6 res" method="POST" enctype="multipart/form-data" style="width: 600px;" >
                  @csrf
                  
                  
                  <div class="form-group row">
                    <label for="old_password" class="col-sm-3 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="old_password" name="old_password" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="new_password" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="new_password" name="new_password" >
                    </div>
                  </div>
                  
                  
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                      </div>
                    </div>
                </form>
                
              </div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>

@endsection
