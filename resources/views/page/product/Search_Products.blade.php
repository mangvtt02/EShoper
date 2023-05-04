@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')


{{-- new --}}
<!-- Main Content -->
<div class="page-container" id="PageContainer">
	<main class="main-content" id="MainContent" role="main">
		<section class="heading-content">
			<div class="heading-wrapper">
				<div class="container">
					<div class="row">
						<div class="page-heading-inner heading-group">
							<div class="breadcrumb-group">
								<h1 class="hidden">Trang tìm kiếm blogs</h1>
								<div class="breadcrumb clearfix">
								<span ><a href="{{route('page.Home')}}" title="Trang chủ" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
									</span>
									<span class="arrow-space"></span>
									<span >
										<a href="javascript:void(0);" title="Trang tìm kiếm blogs" itemprop="url"><span itemprop="title">Tìm kiếm cho: "{{$kq}}"</span></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="search-content">
			<div class="search-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="search-content-group">
							<div class="search-content-inner">
								<div id="search">
									<div class="expanded-message">
										<div class="search-field">
											<form class="search" action="{{route('page.Search_products')}}" style="position: relative;">
												<input type="hidden" name="type" value="products">
												<button class="search-submit" type="submit" name="search_products">
													<span class="cs-icon icon-search"></span>
												</button>
											<input type="text" name="q" class="search_box" placeholder="Tìm kiếm sản phẩm ..." value="{{$kq}}" autocomplete="off">
											</form>
										</div>
										<span class="subtext">Kết quả tìm kiếm cho "<strong>{{$kq}}</strong>" cho thấy: </span>
										<span class="results">{{count($search)}} kết quả được tìm thấy</span>
									</div>
									<!-- Begin results -->
									<div class="product-item-group clearfix">
										<div class="product-item-inner">
											<!-- results article -->
											<!-- results product -->
											@foreach ($search as $s)
											
                                            <div class="product-item-wrapper col-sm-4">
                                                <div class="row-container product list-unstyled clearfix product-circle">
                                                    <div class="row-left">
                                                        <a href="{{route('page.Product_detail',[$s->id])}}" class="hoverBorder container_item">
                                                            <div class="hoverBorderWrapper">
                                                                <img src="assets/images/product/{{$s->image}}" class="img-responsive front" alt="{{$s->image}}">
                                                                <div class="mask"></div>
                                                            </div>
                                                        </a>
                                                        <div class="hover-mask">
                                                            <div class="group-mask">
                                                                <div class="inner-mask">
                                                                    
                                                                    <div class="effect-ajax-cart">
                                                                        <input type="hidden" name="quantity" value="1">
                                                                    <button class="_btn select-option"  title="Thêm vào giỏ hàng" @if (!Auth::guard('emp')->check())
                                                                    onclick="btn_click();"
                                                                    @endif ><span style="font-weight: bold;" class="cs-icon icon-plus"></span><a @if (Auth::guard('emp')->check())
                                                                    href="{{route('page.Add_cart',[$s->id])}}"
                                                                    @else
                                                                    href="{{route('page.Get_Login')}}" 
                                                                    @endif>Giỏ hàng</a> </button>
                                                                    </div>
                                                                </div>
                                                                <!--inner-mask-->
                                                            </div>
                                                            <!--Group mask-->
														</div>
														@if ($s->discount != 0)
															<div class="product-label">
																<div class="label-element deal-label">
																<span>{{$s->discount}}%</span>
																</div>
															</div>
														@endif
                                                        
                                                    </div>
                                                    <div class="row-right animMix">
                                                        <div class="rating-star">
                                                            <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                                            </span>
                                                        </div>
                                                        <div class="product-title"><a class="title-5" href="{{route('page.Product_detail',[$s->id])}}">{{$s->name}}</a></div>
                                                        <div class="product-price">
                                                            @if ($s->discount != 0)
                                                            <span class="price_sale"><span class="money" data-currency-usd="{{number_format($s->unit_price -($s->unit_price * $s->discount / 100)) }}" data-currency="VND">{{number_format($s->unit_price -($s->unit_price * $s->discount / 100)) }}đ</span></span>
                                                                <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($s->unit_price)}}" data-currency="VND">{{number_format($s->unit_price)}}đ</span></del>
                                                                
                                                            @else
                                                            <span class="price_sale"><span class="money" data-currency-usd="{{number_format($s->unit_price -($s->unit_price * $s->discount / 100)) }}" data-currency="VND">{{number_format($s->unit_price -($s->unit_price * $s->discount / 100)) }}đ</span></span>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											@endforeach
											
										</div>
									</div>
									<!-- End results -->
									<nav aria-label="Page navigation">
										<ul class="pagination">
											{!!$search->appends(['q'=>$kq])->render()!!}
										</ul>
									</nav>
								</div>
								<!-- /#search -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>
@endsection