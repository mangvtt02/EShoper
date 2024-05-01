

@extends('index')
@section('body')
<body class="index-template fastfood_1" >
@endsection
@section('mainContent')
<!-- Main Content -->
<div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
        <!-- BEGIN content_for_index -->
        <div id="shopify-section-1507179171162" class="shopify-section index-section index-section-slideshow">
            <div data-section-id="1507179171162" data-section-type="slideshow-section">
                <section class="home-slideshow-layout">
                    <div class="home-slideshow-wrapper">
                        <div class="group-home-slideshow">
                            <div class="home-slideshow-inner">
                                <div class="home-slideshow-content slideshow_1507179171162">
                                    <ul>
                                        @foreach ($banner as $bn)
                                        <li data-transition="random-static" data-masterspeed="2000" data-saveperformance="on">
                                            <img src="assets/images/banner/{{$bn->image}}" data-lazyload="assets/images/banner/{{$bn->image}}" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                                <div class="slideshow-caption position-left transition-fade">
                                                    <div class="group">
                                                    <a href="{{$bn->link}}">
                                                            <img src="assets/images/banner/{{$bn->slide}}" alt="" />
                                                        </a>
                                                        <!-- <a class="_btn" href="{{$bn->link}}">{{$bn->title}}</a> -->
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tp-bannertimer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- <div id="shopify-section-1509012338884" class="shopify-section index-section index-section-welcome">
            <div data-section-id="1509012338884" data-section-type="welcome-section">
                <section class="home-welcome-layout not-animated" data-animate="zoomIn" data-delay="200">
                    <div class="container">
                        <div class="row">
                            <div class="home-welcome-inner">
                                <h2 class="page-title"></h2>
                                <div class="home-welcome-content">
                                    @foreach ($image as $item)
                                        @if ($item->priority == 'Vị trí 1')
                                            <img class="welcome-banner" src="assets/images/images/{{$item->name}}" alt="" title="">
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div> -->
        @foreach ($type_pr as $tp)
        
        <div class="shopify-section index-section index-section-product">
            <div data-section-id="1509012370397" data-section-type="product-section">
                <section class="home-product-layout">
                    <div class="container">
                        <div class="row">
                            <div class="banner-product-title not-animated" data-animate="fadeInUp" data-delay="200" style="background-image:  url(assets/images/product/{{$tp->banner_type}}); border-radius: 50px;">
                                <div class="title-content">
                                <h2>{{$tp->name}}</h2>
                                </div>
                            </div>
                            <div class="home-product-inner">
                                <div class="home-product-content">
                                    @foreach ($tp->product as $item)
                                    @php
                                        $num_star = 0
                                    @endphp
                                    @if ($item->total_rating>0)
                                        @php
                                            
                                            $num_star = round($item->number_star/$item->total_rating);
                                            
                                        @endphp
                                    @endif
                                    @if ($item->id_type == $tp->id)
                                   
                                    <div class="content_product col-sm-3 not-animated" data-animate="fadeInUp" data-delay="100">
                                        <div class="row-container product list-unstyled clearfix product-circle">
                                            <div class="row-left">
                                            <a href="{{route('page.Product_detail',[$item->id])}}" class="hoverBorder container_item">
                                                    <div class="hoverBorderWrapper">
                                                    <img src="assets/images/product/{{$item->image}}" class="img-responsive front" style="border-radius: 25px; border: 1px solid #000" alt="{{$item->image}}">
                                                        <div class="mask"></div>
                                                    </div>
                                                </a>
                                                <div class="product-label">
                                                    @if ($item->discount != 0)
                            
                                                        <div class="label-element deal-label">
                                                            <span>{{$item->discount}}%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row-right animMix">
                                                <div class="rating-star">
                                                    <span class="spr-starratings spr-review-header-starratings">
                                                        @for($i=1;$i<=5;$i++)
                                                            <i  class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                                                        @endfor
                                                    </span>
                                                    <span class="spr-badge-caption">{{$item->total_rating}} đánh giá</span>	
                                                </div>
                                                <div class="product-title"><a class="title-5" href="{{route('page.Add_cart',[$item->id])}}">{{$item->name}}</a></div>
                                                <div class="product-price">
                                                    @if ($item->discount != 0)
                                                    <span class="price_sale"><span class="money" data-currency-usd="{{number_format($item->unit_price -($item->unit_price * $item->discount / 100)) }}" data-currency="VND">{{number_format($item->unit_price -($item->unit_price * $item->discount / 100)) }}đ</span></span>
                                                        <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($item->unit_price)}}" data-currency="VND">{{number_format($item->unit_price)}}đ</span></del>
                                                        
                                                    @else
                                                    <span class="price_sale"><span class="money" data-currency-usd="{{number_format($item->unit_price -($item->unit_price * $item->discount / 100)) }}" data-currency="VND">{{number_format($item->unit_price -($item->unit_price * $item->discount / 100)) }}đ</span></span>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endif 
                                    
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @endforeach
    </main>
</div>
@endsection