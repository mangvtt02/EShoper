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
                                        <h2>Lấy lại mật khẩu</h2>
                                       
										{{-- errors --}}
		@if (session('error'))
<div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
@endif

{{-- success --}}

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif
                                    <form method="post" action="{{route('page.Recover_Password')}}" accept-charset="UTF-8">
                                        @csrf
											<div class="clearfix large_form form-item">
												<input type="email" value="" placeholder="Nhập email ..." name="email" class="text" size="30">
											</div>
											<div class="action_bottom">
												<input class="_btn" type="submit" value="Gửi">
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