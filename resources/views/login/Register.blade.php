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
                                        <h2>Đăng ký</h2>
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
                                    <form method="post" action="{{route('page.Register')}}" accept-charset="UTF-8">
                                        @csrf
											<div class="clearfix large_form form-item">
												<input type="text" value="" placeholder="Tên đăng ký" name="name" class="text" size="30">
											</div>
											
											<div class="clearfix large_form form-item">
												<input type="email" value="" placeholder="Email" name="email" class="text" size="30">
											</div>
											<div class="clearfix large_form form-password form-item">
												<input type="password" value="" placeholder="Password" name="password" class="password text" size="30">
												<span class="cs-icon icon-eye"></span>
											</div>
											<div class="action_bottom">
												<input class="_btn" type="submit" name="create_account" value="Tạo tài khoản">
                                            <span class="note"><span class="or">hoặc</span><a href="{{route('page.Get_Login')}}" name="login">Đăng nhập</a></span>
											</div>
										</form>
									</div>
									<!-- #register -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
@endsection