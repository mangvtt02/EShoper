@extends('index')
@section('mainContent')
    <!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="customers-layout login-layout">
				<div class="customers-wrapper">
					<div class="container">
						<div class="row">
							<div class="customers-inner">
								<div class="customers-content">
									<div id="login" class="customers">
										<h2>Đăng nhập</h2>
{{-- error --}}
@if (count($errors)>0)
<div class="alert alert-danger" role="alert" name="error_login">
  @foreach ($errors->all() as $er)
      <strong>{{$er}}<br></strong>
  @endforeach
</div>
@endif
{{-- sai --}}
@if (session('sai'))
<div class="alert alert-danger" role="alert" name="error_login">
	<strong>{{session('sai')}}</strong>
</div>
@endif


{{-- success --}}

@if (session('success'))
<div class="alert alert-success" role="alert" name="success_login">
	<strong>{{session('success')}}</strong>
</div>
@endif
									<form method="post" action="{{route('page.Login')}}" accept-charset="UTF-8">
										@csrf
											<div class="clearfix large_form form-item">
												<input type="email" value="" placeholder="Địa chỉ email" name="email" id="customer_email" class="text">
											</div>
											<div class="clearfix large_form form-item form-password">
												<input type="password" value="" placeholder="Mật khẩu" name="password" id="customer_password" class="text" size="16">
												<span class="cs-icon icon-eye"></span>
											</div>
											<div class="clearfix">
												<a class="note" href="{{route('page.Reset_Password')}}" onclick="showRecoverPasswordForm();return false;" name="password_retrieval">Lấy lại mật khẩu?</a>
											</div>
											<div class="action_bottom">
												<input class="_btn" type="submit" value="Đăng nhập" name="submit">
											</div>
										</form>
										<div class="create-account">
											<h4>Bạn có tài khoản chưa?</h4>
                                        <a href="{{route('page.Register')}}" class="_btn" name="create_account">Tạo tài khoản</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<script type="text/javascript">
				function showRecoverPasswordForm() {
					document.getElementById('recover-password').style.display = 'block';
					document.getElementById('login').style.display = 'none';
				}

				function hideRecoverPasswordForm() {
					document.getElementById('recover-password').style.display = 'none';
					document.getElementById('login').style.display = 'block';
				}

				if (window.location.hash == '#recover') {
					showRecoverPasswordForm()
				}
			</script>
		</main>
	</div>
@endsection