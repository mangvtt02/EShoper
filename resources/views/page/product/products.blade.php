@extends('page/product/index')

@section('content_product_t')

	<!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="heading-content">
				<div class="heading-wrapper">
					<div class="container">
						<div class="row">
							<div class="page-heading-inner heading-group">
								<div class="breadcrumb-group">
									<h1 class="hidden">Sản phẩm</h1>
									<div class="breadcrumb clearfix">
                                    <span ><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
										</span>
										<span class="arrow-space"></span>
										<span >
											<a href="javascript:void(0);" title="Sản phẩm" itemprop="url"><span itemprop="title">Sản phẩm</span></a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="collection-layout">
				<div class="collection-wrapper">
					<div class="container">
						<div class="row">
							<div id="shopify-section-collection-template" class="shopify-section">
								<div class="collection-inner collection-sidebar">
									<!-- Tags loading -->
									<div id="tags-load" style="display:none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
									<div id="collection">
										<div class="clearfix">
											<div class="collection-toolbar _mobile col-sm-9">
                                                @foreach ($image as $item)
                                                @if ($item->priority == 'Vị trí 4')
                                                    <a href="{{$item->link}}" class="collection-banner-top">
                                                        <img src="assets/images/images/{{$item->name}}" alt="image product" title="">
                                                    </a>
                                                @endif
                                               
                                                @endforeach
												
												<div class="group_toolbar">
													<div class="group-left">
														<div class="filter-mobile">
															<a href="javascript:void(0)" class="filter-icon"> 
																<span class="cs-icon icon-filter"></span>
															</a>
														</div>
														<!-- Sort by -->
														<div class="sortBy">
															<div class="dropdown-toggle" data-toggle="dropdown">
																<span class="toolbar-title">Sắp xếp theo</span>
																<button class="sortButton">
																	<span class="name">Tùy chọn</span><i class="fa fa-caret-down"></i>
																</button>
																<i class="sub-dropdown1"></i>
																<i class="sub-dropdown"></i>
															</div>
															<div class="sortBox control-container dropdown-menu">
																<ul class="sortForm list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                                                                    <li class="sort manual"><a href="{{url()->current()}}">Mặc định</a></li>
                                                                    <li class="sort price-ascending"><a href="{{request()->fullUrlWithQuery(['sort'=>1])}}">Giá từ thấp đến cao</a></li>
                                                                    <li class="sort price-descending"><a href="{{request()->fullUrlWithQuery(['sort'=>2])}}">Giá từ cao đến thấp</a></li>
                                                                    <li class="sort price-descending"><a href="{{request()->fullUrlWithQuery(['sort'=>3])}}">Mới nhất</a></li>
                                                                </ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="collection-content">

@endsection
@section('content_product')


<div class="collection-mainarea  col-sm-9 clearfix">
    <div class="collection-toolbar _desktop">
        @foreach ($image as $item)
            @if ($item->priority == 'Vị trí 4')
                <a href="{{$item->link}}" class="collection-banner-top">
                    <img src="assets/images/images/{{$item->name}}" alt="image product" title="">
                </a>
            @endif
        @endforeach                                 
        <div class="group_toolbar">
            <div class="group-left">
                <div class="filter-mobile">
                    <a href="javascript:void(0)" class="filter-icon"> 
                        <span class="cs-icon icon-filter"></span>
                    </a>
                </div>
                <!-- Sort by -->
                <div class="sortBy">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <span class="toolbar-title">Sắp xếp theo</span>
                        <button class="sortButton">
                            <span class="name">Tùy chọn</span><i class="fa fa-caret-down"></i>
                        </button>
                        <i class="sub-dropdown1"></i>
                        <i class="sub-dropdown"></i>
                    </div>
                    <div class="sortBox control-container dropdown-menu" style="display: none;">
                        <ul class="sortForm list-unstyled option-set text-left list-styled" data-option-key="sortBy">
                            <li class="sort manual"><a href="{{url()->current()}}">Mặc định</a></li>
                            <li class="sort price-ascending"><a href="{{request()->fullUrlWithQuery(['sort'=>1])}}">Giá từ thấp đến cao</a></li>
                            <li class="sort price-descending"><a href="{{request()->fullUrlWithQuery(['sort'=>2])}}">Giá từ cao đến thấp</a></li>
                            <li class="sort price-descending"><a href="{{request()->fullUrlWithQuery(['sort'=>3])}}">Mới nhất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- View as -->
            <div class="grid_list">
                <ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
                    <li data-option-value="fitRows" id="goGrid" class="active goAction" data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid">
                        <i class="icon-small icon-small-grid"></i>
                    </li>
                    <li data-option-value="straightDown" id="goList" class="goAction" data-toggle="tooltip" data-placement="top" title="" data-original-title="List">
                        <i class="icon-small icon-small-list"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="collection-items clearfix">
        <div class="products">
           
            @foreach ($products as $pr)
            @php
                $num_star = 0
            @endphp
            @if ($pr->total_rating>0)
                @php
                    $dem = 0;
                    $num_star = round($pr->number_star/$pr->total_rating);
                    
                @endphp
            @endif 
                <div class="product-item col-sm-4" >
                    <div class="product product-circle" >
                        <div class="row-left" >
                            <a href="{{route('page.Product_detail',[$pr->id])}}" class="hoverBorder container_item" >
                                <div class="hoverBorderWrapper" >
                                    <img src="assets/images/product/{{$pr->image}}" style="width: 200px;height: 200px;" class="img-responsive front" alt="{{$pr->image}}">
                                </div>
                            </a>
                            <div class="product-label">
                                @if ($pr->discount != 0)
                                
                                <div class="label-element deal-label">
                                    <span>{{$pr->discount}}%</span>
                                
                                </div>
                                
                            @endif
                                
                            </div>
                            <div class="hover-mask grid-mode">
                                <div class="group-mask">
                                    <div class="inner-mask">
                                    
                                        
                                            <div class="effect-ajax-cart">
                                                <input type="hidden" name="quantity" value="1">
                                            <button class="_btn select-option"  title="Thêm vào giỏ hàng" @if (!Auth::guard('emp')->check())
                                            onclick="btn_click();"
                                            @endif ><span style="font-weight: bold;" class="cs-icon icon-plus"></span><a @if (Auth::guard('emp')->check())
                                            href="{{route('page.Add_cart',[$pr->id])}}"
                                            @else
                                            href="{{route('page.Get_Login')}}" 
                                            @endif>Giỏ hàng</a> </button>
                                            </div>
                                    
                                    </div>
                                    <!--inner-mask-->
                                </div>
                                <!--Group mask-->
                            </div>
                        </div>
                        <div class="row-right animMix">
                            <div class="grid-mode">
                                <div class="rating-star">
                                    <span class="spr-starratings spr-review-header-starratings">
                                        @for($i=1;$i<=5;$i++)
                                            <i  class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                                        @endfor
                                    </span>
                                    <span class="spr-badge-caption">{{$pr->total_rating}} đánh giá</span>	
                                </div>
                            <div class="product-title"><a class="title-5" href="{{route('page.Product_detail',[$pr->id])}}">{{$pr->name}}</a></div>
                                <div class="product-price">
                                    @if ($pr->discount != 0)
                                    <span class="price_sale"><span class="money" data-currency-usd="{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}" data-currency="VND">{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}đ</span></span>
                                        <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($pr->unit_price)}}" data-currency="VND">{{number_format($pr->unit_price)}}đ</span></del>
                                        
                                    @else
                                    <span class="price_sale"><span class="money" data-currency-usd="{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}" data-currency="VND">{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}đ</span></span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="list-mode hide">
                                <div class="list-collection-left">
                                    <div class="group">
                                        <div class="product-title"><a class="title-5" href="{{route('page.Product_detail',[$pr->id])}}">{{$pr->name}}</a></div>
                                        <div class="rating-star">
                                            <span class="spr-starratings spr-review-header-starratings">
                                                @for($i=1;$i<=5;$i++)
                                                    <i  class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                                                @endfor
                                            </span>
                                            <span class="spr-badge-caption">{{$pr->total_rating}} đánh giá</span>	
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        @if ($pr->discount != 0)
                                        <span class="price_sale"><span class="money" data-currency-usd="{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}" data-currency="VND">{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}đ</span></span>
                                            <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($pr->unit_price)}}" data-currency="VND">{{number_format($pr->unit_price)}}đ</span></del>
                                            
                                        @else
                                        <span class="price_sale"><span class="money" data-currency-usd="{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}" data-currency="VND">{{number_format($pr->unit_price -($pr->unit_price * $pr->discount / 100)) }}đ</span></span>
                                        @endif
                                    
                                    </div>
                                </div>
                                <div class="list-collection-right">
                                    <div class="product-description">
                                        {!!$pr->description!!}
                                    </div>
                                    <div class="group-actionbutton">
                                        <div class="effect-ajax-cart">
                                            <input type="hidden" name="quantity" value="1">
                                        <button class="_btn select-option"  title="Thêm vào giỏ hàng" @if (!Auth::guard('emp')->check())
                                        onclick="btn_click();"
                                        @endif ><span style="font-weight: bold;" class="cs-icon icon-plus"></span><a @if (Auth::guard('emp')->check())
                                        href="{{route('page.Add_cart',[$pr->id])}}"
                                        @else
                                        href="{{route('page.Get_Login')}}" 
                                        @endif>Giỏ hàng</a> </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         
        </div>
    </div>
    <div class="collection-bottom-toolbar">
       
        <div class="product-pagination col-sm-6">
            <div class="pagination_group">
               <ul class="pagination pagination-collection">
                @if ($price && $sort)
                    {!! $products->appends(['price'=>$price])->appends(['sort'=>$sort])->render() !!} 
                @elseif($price)
                    {!! $products->appends(['price'=>$price])->render() !!} 
                @elseif($sort)
                    {!! $products->appends(['sort'=>$sort])->render() !!} 
                @else
                    {!! $products->render() !!} 
                   {{-- @if ($sort)
                        {!! $products->appends(['sort'=>$sort])->render() !!} 
                    @elseif($price)
                        {!! $products->appends(['price'=>$price])->render() !!} 
                    @elseif($price && $sort)
                        {!! $products->appends(['price'=>$price])->appends(['sort'=>$sort])->render() !!} 
                    @else
                        {!! $products->render() !!}  --}}
                   @endif
                    
               </ul>
            </div>
        </div>
    </div>
</div>


@endsection