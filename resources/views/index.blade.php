<!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#7796A8">
	<meta name="description" content="" />
	<title>
	EShoper
	</title>
	<base href="{{asset('public')}}/">
	<link href="assets/stylesheets/font1.css" rel="stylesheet">
	<link href="assets/stylesheets/font2.css" rel="stylesheet">
	<link href="assets/stylesheets/font3.css" rel="stylesheet">
	<style>
		.active_star{
				color: #8b8b89 !important;
			}
	</style>
	<link rel="shortcut icon" href="assetsAdmin/images/logo.png" />
	<link rel="shortcut icon" href="assetsAdmin/images/logo-felix.jpg" />


	<link href="maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">  
    <link href="maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/stylesheets/fonts.googleapis.css" rel="stylesheet" type="text/css" media="all">	
    <link href="cdn.linearicons.com/free/1.0.0/icon-font.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/social-buttons.scss.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/stylesheets/cs.styles.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/stylesheets/font-icon.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/stylesheets/owl.carousel.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/stylesheets/spr.css" rel="stylesheet" type="text/css" media="all">
	<link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/cs.animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/slideshow-fade.css" rel="stylesheet" type="text/css" media="all">
    <link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/animations.css" rel="stylesheet" type="text/css" media="all">
    <link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/themepunch.revolution.css" rel="stylesheet" type="text/css" media="all">
    <link href="cdn.shopify.com/s/files/1/2487/3424/t/3/assets/jquery.fancybox.scss.css" rel="stylesheet" type="text/css" media="all">
	
	<script type="text/javascript" src="assets/javascripts/jquery.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/classie.js"></script>
	<script type="text/javascript" src="assets/javascripts/application-appear.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/cs.script.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.currencies.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.zoom.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/linkOptionSelectors.js"></script>
	<script type="text/javascript" src="assets/javascripts/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/scripts.js"></script>
	<script type="text/javascript" src="assets/javascripts/social-buttons.js"></script>
	<script type="text/javascript" src="assets/javascripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.fancybox.js"></script>
	<script type="text/javascript" src="assets/javascripts/jquery.gmap.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/js.js"></script>
	
	
	
</head>

@yield('body')

	<!--Header-->
	<header id="top" class="header clearfix" style="background-color: #000000 !important">
		<div  id="shopify-section-theme-header" class="shopify-section">
			<div data-section-id="theme-header" data-section-type="header-section">
				<section class="main-header">
					<div class="main-header-wrapper">
						<div class="container clearfix">
							<div class="row">
								<div class="main-header-inner">
									<div class="nav-logo">
                                    <a href="{{route('page.Home')}}"><img style="width: 70%; height: 70%; margin-top:10px; border-radius: 10px" src="assets/images/logo.png" alt="" title="Fast Food"></a>
										<h1 style="display:none"><a href="{{route('page.Home')}}">Fast Food</a></h1>
									</div>
									<div class="nav-top">
										<div class="nav-menu">
											<ul class="navigation-links ">
												<li class="nav-item dropdown navigation {{Request::segment(1) ? '' : 'active'}}">
													<a href="{{route('page.Home')}}" >
														<span>Trang chủ</span>
													</a>
												</li>
												<li class="nav-item dropdown navigation
												@foreach ($menu as $mn)
													@if ($mn->new == 1)
														@if ( Request::segment(2) == $mn->id  )
																active
														@endif
													@endif
												@endforeach
												">
													<a href="javascript:void(0);" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
														<span>Winter</span>
														<i class="fa fa-angle-down"></i>
														<i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</a>
													
													<ul class="dropdown-menu" >
														@foreach ($menu as $mn)

															@if ($mn->new == 1)

																<li class="li-sub-mega @if (Request::segment(1) ==='product' && Request::segment(2) == $mn->id )
																	active
																@endif">
																<a tabindex="-1" href="{{route('page.Product',[$mn->id])}}">{{$mn->name}}</a>
																</li>

															@endif															
														
														@endforeach
														
													</ul>
												</li>
												<li class="nav-item dropdown navigation
													@foreach ($menu as $mn)
														@if ($mn->new == 2)
															@if ( Request::segment(2) == $mn->id  )
																	active
															@endif
														@endif															
													@endforeach
												">
													<a href="javascript:void(0);" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
														<span>Summer</span>
														<i class="fa fa-angle-down"></i>
														<i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</a>
													<ul class="dropdown-menu">
														@foreach ($menu as $mn)

															@if ($mn->new == 2)

																<li class="li-sub-mega @if (Request::segment(1) ==='product' && Request::segment(2) == $mn->id )
																	active
																@endif">
																<a tabindex="-1" href="{{route('page.Product',[$mn->id])}}">{{$mn->name}}</a>
																</li>

															@endif															
														
														@endforeach
													</ul>
												</li>
												<li class="nav-item {{Request::segment(1) === 'contact' ? 'active' : ''}}">
													<a href="{{route('page.Contact')}}">
														<span>Liên hệ</span>
													</a>
												</li>
												<li class="nav-item {{Request::segment(1) === 'about' ? 'active' : ''}}">
													<a href="{{route('page.About')}}">
														<span>Giới Thiệu</span>
													</a>
												</li>
												<li class="nav-item {{Request::segment(1) === 'blog' ? 'active' : ''}}">
													<a href="{{route('page.Blog')}}">
														<span>Tin Tức</span>
													</a>
												</li>
												
											</ul>
										</div>
										<div class="nav-icon">
											<div class="m_search search-icon" id="search">
												<a href="#" data-toggle="modal" data-target="#lightbox-search">
													<i class="fa fa-search"></i>
												</a>
											</div>
											@if (Auth::guard('emp')->check())
												
											
											<div class="icon_cart">
												<div class="m_cart-group">
													<a class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
														<div class="num-items-in-cart">
															<div class="items-cart">
																<div class="num-items-in-cart">
																	<i class="fa fa-shopping-cart"></i>
																	<span class="cart_text">
																		@if(is_countable($cart->items) && count($cart->items)>0)
																			<span class="number">{{count($cart->items)}}</span>   
																		@endif 
																	</span>
																</div>
															</div>
														</div>
													</a>
													@if (is_countable($cart->items) && count($cart->items)>0)
													<div class="dropdown-menu cart-info">														
														<div class="cart-content">
															<div class="text-items"><span>{{count($cart->items)}} sản phẩm trong giỏ hàng</span> <span class="cs-icon icon-close close-dropdown"></span> </div>														
															<div class="items control-container">
																@if (count($cart->items))
															@foreach ($cart->items as $items)
															@php   
															$price = ($items['unit_price'] - ($items['unit_price'] * $items['discount'] )/100) * $items['quantity'];
															
															@endphp
																<div class="group_cart_item">
																<div class="cart-left"><a class="cart-image" href="{{route('page.Product_detail',[$items['id']])}}"><img src="assets/images/product/{{$items['image']}}" alt="{{$items['image']}}" title=""></a></div>
																	<div class="cart-right">
																	<div class="cart-title"><a href="{{route('page.Product_detail',[$items['id']])}}">{{$items['name']}}</a></div>
																		<div class="cart-price"><span class="money" data-currency-usd="{{$price}}" data-currency="VND">{{number_format($price)}}</span></div>
																		<div class="cart-qty">
																		<span class="quantity">Số lượng: {{$items['quantity']}}</span>
																			<a class="cart-close" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{route('page.Delete_cart',[$items['id']])}}">
																				<span class="cs-icon icon-bin"></span>
																			</a>
																		</div>
																	</div>
																	
																</div>
																@endforeach
																@endif
															</div>
														<div class="action"><a class="_btn" href="{{route('page.Cart_details')}}">Tiến hành đặt hàng</a><a class="_btn float-right" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả không?')" href="{{route('page.Delete_all_cart')}}">Xóa tất cả sản phẩm</a></div>
														</div>
													</div>
													@endif 
												</div>
											</div>

											@endif
											<div class="icon_accounts">
												<div class="m_login-account">
													<span class="dropdown-toggle login-icon" data-toggle="dropdown">
														<i class="fa fa-ellipsis-v"></i>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
													</span>
													<div class="m_dropdown-login dropdown-menu login-content">
														<div class="clearfix ml-3">
															@if (!Auth::guard('emp')->check())
																	<a class="btn-custom-ss btn" style="background: #fff; border-radius: 10px;" href="{{route('page.Get_Login')}}">Đăng nhập</a>	
																	<a class="btn-custom-ss btn" style="background: #fff; border-radius: 10px;" href="{{route('page.Get_Register')}}">Đăng ký</a>	
															@endif
															<style>
																.btn-custom-ss:hover {
																	background-color: #000 !important;
																	color: #fff;
																}
															</style>
																
															
															<!-- <ul class="wish-compare-content"> -->
															<ul class="account-content">
															
															@if (Auth::guard('emp')->check())
															<li class="avata-item">
																	<img src="assets/images/user/{{$user->image}}" alt="profile image" style="padding-bottom: 10px; width: 70px; height: 70px; border-radius: 999px">
																	<p class="user-name">{{$user->name}}</p>
															</li>
															<li class="link-item">
																<svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zm4.854-7.85a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
																  </svg>
																<a @if ($user->token != 1)
																		href="{{route('page.get_info')}}"
																	@else
																		href="javascript:void(0);"
																	@endif>Quản lý tài khoản
																</a>
															</li>
															<li class="link-item">
																<svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
																	<path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
																  </svg>
																<a href="{{route('page.Logout')}}" @if(is_countable($cart->items) && count($cart->items)>0)
																	onclick="return confirm('Khi đăng xuất các sản phẩm trong giỏ hàng sẽ bị mất?')"
																@endif >Đăng xuất</a>
															</li>
															@endif
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="navMobile-navigation">
										<div class="navMobile-logo">
										<a href="{{route('page.Home')}}"><img class="header-logo-image" src="assets/images/logo.png" alt="" title="Fast Food" /></a>
										</div>
										<div class="group_mobile_right">
											<div class="nav-icon">
												<div class="m_search search-tablet-icon">
													<span class="dropdownMobile-toggle search-dropdown">
														<span class="icon-dropdown cs-icon icon-search" data-class="cs-icon icon-search"></span>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i>
													</span>
													<div class="m_dropdown-search dropdown-menu search-content">
													<form class="search" action="{{route('page.Search_products')}}">
															<input type="hidden" name="type" value="product" />
															<input type="text" name="q" class="search_box" placeholder="Tìm kiếm sản phẩm tại đây..." value="" />
															<span class="search-clear cs-icon icon-close"></span>
															<button class="search-submit" type="submit" name="search_products">
																<span class="cs-icon icon-search"></span>
															</button>
														</form>
													</div>
												</div>
												@if (Auth::guard('emp')->check())
													
											
												<div class="icon_cart">
													<div class="m_cart-group">
														
														<a class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
															<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
															<div class="num-items-in-cart">
																<div class="items-cart">
																	<div class="num-items-in-cart">
																		<i class="fa fa-shopping-cart"></i>
																		<span class="cart_text">
																			@if(is_countable($cart->items) && count($cart->items)>0)
																				<span class="number">{{count($cart->items)}}</span>   
																			@endif 
																		</span>
																	</div>
																</div>
															</div>
														</a>
														@if (is_countable($cart->items) && count($cart->items)>0)
														<div class="dropdown-menu cart-info">														
															<div class="cart-content">
																<div class="text-items"><span>{{count($cart->items)}} sản phẩm trong giỏ hàng</span> <span class="cs-icon icon-close close-dropdown"></span> </div>														
																<div class="items control-container">
																	@if (count($cart->items))
																		@foreach ($cart->items as $items)
																		@php   
																			$price = ($items['unit_price'] - ($items['unit_price'] * $items['discount'] )/100) * $items['quantity'];
																		@endphp
																			<div class="group_cart_item">
																			<div class="cart-left"><a class="cart-image" href="{{route('page.Product_detail',[$items['id']])}}"><img src="assets/images/product/{{$items['image']}}" alt="{{$items['image']}}" title=""></a></div>
																				<div class="cart-right">
																				<div class="cart-title"><a href="{{route('page.Product_detail',[$items['id']])}}">{{$items['name']}}</a></div>
																					<div class="cart-price"><span class="money" data-currency-usd="{{$price}}" data-currency="VND">{{number_format($price)}}</span></div>
																					<div class="cart-qty">
																					<span class="quantity">Số lượng: {{$items['quantity']}}</span>
																						<a class="cart-close" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{route('page.Delete_cart',[$items['id']])}}">
																							<span class="cs-icon icon-bin"></span>
																						</a>
																					</div>
																				</div>
																			</div>
																		@endforeach
																	@endif
																</div>
															<div class="action">
																<a  class="_btn" href="{{route('page.Cart_details')}}">Tiến hành đặt hàng</a>	
																<a class="_btn float-right" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả không?')" href="{{route('page.Delete_all_cart')}}">Xóa tất cả sản phẩm</a>
															</div>
															</div>
														</div>
														@endif 
													</div>
												</div>
												@endif
												<div class="icon_accounts">
													<div class="m_login-account">
														<span class="dropdownMobile-toggle login-icon">
															<i class="icon-dropdown cs-icon icon-ellipsis" data-class="cs-icon icon-ellipsis" aria-hidden="true"></i>
															<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
															<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
														</span>
														<div class="m_dropdown-login dropdown-menu login-content">
															<div class="clearfix">
																<div class="login-register-content">
																	
																</div>
																<ul class="wish-compare-content">
																	
																	@if (Auth::guard('emp')->check())
																	<div class="user-wrapper">
																		<div class="profile-image">
																		<img src="assets/images/user/{{$user->image}}" alt="profile image">
																		</div>
																	</div>
																	<a href="javascript:void(0);">{{$user->name}}</a>
																<li class="link-item">
																	<svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zm4.854-7.85a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
																	  </svg>
																	
																	<a @if ($user->token != 1)
																			href="{{route('page.get_info')}}"
																		@else
																			href="javascript:void(0);"
																		@endif>Quản lý tài khoản</a>
																</li>
																<li class="link-item">
																	<svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
																		<path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
																	  </svg>
																	<a href="{{route('page.Logout')}}" @if(is_countable($cart->items) && count($cart->items)>0)
																		onclick="return confirm('Khi đăng xuất các sản phẩm trong giỏ hàng sẽ bị mất?')"
																	@endif >Đăng xuất</a>
																</li>
																	@endif
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="navMobile-menu">
												<div class="group_navbtn">
													<a href="javascript:void(0)" class="dropdown-toggle-navigation">                  
														<span class="cs-icon icon-menu"></span>
														<i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
														<i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
													</a>
													<div class="navigation_dropdown_scroll dropdown-menu">
														<ul class="navigation_links_mobile">
															<li class="nav-item navigation navigation_mobile ">
																<a href="{{route('page.Home')}}" class="menu-mobile-link">
																	Trang chủ
																</a>
															</li>
															<li class="nav-item navigation navigation_mobile ">
																<a href="javascript:void(0);" class="menu-mobile-link">
																	Winter
																</a>
																<a href="javascript:void(0)" class="arrow_sub arrow">
																	<i class="arrow-plus"></i>
																</a>
																<ul class="menu-mobile-container" style="display: none;">

																@foreach ($menu as $mn)
																	@if ($mn->new == 1)
																		<li class="li-sub-mega ">
																		<a tabindex="-1" href="{{route('page.Product',[$mn->id])}}">{{$mn->name}}</a>
																		</li>
																	@endif															
																@endforeach
																</ul>
															</li>
															<li class="nav-item navigation navigation_mobile">
																<a href="javascript:void(0);" class="menu-mobile-link">
																	Summer
																</a>
																<a href="javascript:void(0)" class="arrow_sub arrow">
																	<i class="arrow-plus"></i>
																</a>
																<ul class="menu-mobile-container" style="display: none;">

																@foreach ($menu as $mn)
																	@if ($mn->new == 2)
																		<li class="li-sub-mega">
																		<a tabindex="-1" href="{{route('page.Product',[$mn->id])}}">{{$mn->name}}</a>
																		</li>
																	@endif															
																@endforeach
																</ul>
															</li>
															<li class="nav-item">
																<a href="{{route('page.Contact')}}">
																	<span>Liên hệ</span>
																</a>
															</li>
															<li class="nav-item">
																<a href="{{route('page.About')}}">
																	<span>Giới Thiệu</span>
																</a>
															</li>
															<li class="nav-item">
																<a href="{{route('page.Blog')}}">
																	<span>Tin tức</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<script>
				function addaffix(scr) {
					if ($(window).innerWidth() >= 992) {
						if (scr > 153) {
							if (!$('#top').hasClass('affix')) {
								$('#top').addClass('affix').addClass('fadeInDown animated');
							}
						} else {
							if ($('#top').hasClass('affix')) {
								$('#top').removeClass('affix').removeClass('fadeInDown animated');
							}
						}
					} else if ($(window).innerWidth() < 992 && $(window).innerWidth() > 767) {
						if (scr > 95) {
							if (!$('#top').hasClass('affix')) {
								$('#top').addClass('affix').addClass('fadeInDown animated');
							}
						} else {
							if ($('#top').hasClass('affix')) {
								$('#top').removeClass('affix').removeClass('fadeInDown animated');
							}
						}
					} else {
						if (scr > 45) {
							if (!$('#top').hasClass('affix')) {
								$('#top').addClass('affix').addClass('');
							}
						} else {
							if ($('#top').hasClass('affix')) {
								$('#top').removeClass('affix').removeClass('');
							}
						}
					}
				}
				$(window).scroll(function() {
					"use strict"; 
					
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				});
				$(window).resize(function() {
					"use strict"; 
					
					var scrollTop = $(this).scrollTop();
					addaffix(scrollTop);
				});
			</script>
		</div>
	</header>
	<div class="fix-sticky"></div>
	
	@yield('mainContent')
	
	<!-- Footer -->
	<footer class="footer">
		<div id="shopify-section-theme-footer" class="shopify-section">
			<section class="footer-information-block clearfix" style="background-image:  url(assets/images/bg_footer.jpg);">
				<div class="container">
					<div class="row">
						<div class="footer-information-inner">
							<div class="footer-information-content">
								<div class="information-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="100">
									<div class="about-content">
										@foreach ($contact_info as $item)
											
										<div class="about-contact">
											<div class="item">
												<span class="cs-icon icon-marker"></span><address><iframe src="{{$item->address}}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></address>
											</div>
											<!-- <div class="item">
												<span class="cs-icon icon-phone"></span><a href="tel:{{$item->tel}}">{{$item->tel}}</a>
											</div>
											<div class="item">
												<span class="cs-icon icon-mail"></span><a href="mailto:{{$item->email}}">{{$item->email}}</a>
											</div> -->
										</div>
										
										@endforeach
									</div>
								</div>
								<div class="social-payment-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="300">
									<h5 class="footer-title"> THEO DÕI CHÚNG TÔI</h5>
									<div class="social-content">
										<div class="social-caption">
											<a href="https://www.facebook.com/shopify" title="Fast Food on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
											<a href="https://plus.google.com/+shopify" title="Fast Food on Google+" class="icon-social google-plus"><i class="fa fa-google-plus"></i></a>											<a href="https://instagram.com/shopify" title="Fast Food on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
											<a href="https://www.youtube.com/user/shopify" title="Fast Food on Youtube" class="icon-social youtube"><i class="fa fa-youtube"></i></a>
										</div>
									</div>
								</div>
								<div class="social-payment-item col-sm-4 not-animated" data-animate="fadeInUp" data-delay="300">
									<h5 class="footer-title"> VĂN PHÒNG ĐẠI DIỆN</h5>
									<div class="social-content">
										<ul>
											Công ty thời trang EShoper <br>  Nguyên Xá, Minh Khai, Bắc Từ Liêm, <br> Thành phố Hà Nội
											<br>
											SĐT: +84 (09) xx xxx xxx 
											<br>
											Email: exampleemail123@gmail.com
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="copy-right clearfix" style="background-color: #1a1816 !important">
				<div class="copy-right-wrapper">
					<div class="copy-right-inner">
					<div class="footer_copyright">Copyright &copy; 2024 <a href="{{route('page.Home')}}" title="">ESHOPER</a></div>
					</div>
				</div>
			</section>
		</div>
	</footer>
	<!-- Modal Search-->
	<div class="modal fade" id="lightbox-search" tabindex="-1" role="dialog" aria-labelledby="lightbox-search" aria-hidden="true" style="display: none;">
		<div class="modal-dialog animated" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span class="cs-icon icon-close"></span>
			</button>
					<h4 class="modal-title" id="myModalLabel">Tìm kiếm sản phẩm</h4>
				</div>
				<div class="modal-body">
					<div id="search-info">
						<form class="search" action="{{route('page.Search_products')}}" style="position: relative;">
							<input type="hidden" name="type" value="product">
							<input type="text" name="q" class="search_box" placeholder="Tìm kiếm sản phẩm tại đây ..." autocomplete="off">
							<span class="search-clear cs-icon icon-close" style="display: none;"></span>
							<button class="search-submit" type="submit">
								<span class="cs-icon icon-search"></span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Float right icon -->
	<div class="float-right-icon">
		<ul>
			<li>
				<div id="scroll-to-top" data-toggle="" data-placement="left" title="Scroll to Top" class="off">
					<i class="fa fa-angle-up"></i>
				</div>
			</li>
		</ul>
	</div>

</body>
