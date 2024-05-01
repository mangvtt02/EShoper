@extends('index')
@section('mainContent')
    <!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="customers-layout register-layout">
				<div class="customers-wrapper">
					<div class="container">
						<div class="row">
							<div class="customers-inner">
								<div class="customers-content">
									<div id="register" class="customers">
                                        <h2>Đặt lại mật khẩu</h2>
						{{-- errors --}}
						@if (count($errors)>0)
						<div class="alert alert-danger" role="alert">
						@foreach ($errors->all() as $er)
							<strong>{{$er}}<br></strong>
						@endforeach
						</div>
						@endif

						{{-- success --}}

						@if (session('success'))
						<div class="alert alert-success" role="alert">
						{{session('success')}}
						</div>
						@endif

                                    @php
                                    $email = $_GET['email'];
                                        $token =  $_GET['remember_token'];
                                    @endphp
                                    <form method="post" action="{{route('page.Set_Password')}}" accept-charset="UTF-8">
                                        @csrf
                                            <input type="hidden" value="{{$email}}" name="email" >
                                            <input type="hidden" value="{{$token}}"  name="remember_token">
											<div class="clearfix large_form form-item">
												<input type="password" value="" placeholder="Nhập mật khẩu mới ..." name="password_account" class="text">
											</div>
											<div class="action_bottom">
												<input class="_btn" type="submit" value="Gửi">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
@endsection