@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')
    
                                @yield('content_product_t')
                                @yield('content_product_de')
                                    <div class="collection-leftsidebar sidebar col-sm-3 clearfix">
                                        <div class="collection-leftsidebar-group">
                                            <div class="sidebar-block collection-block">
                                                <h3 class="sidebar-title">
                                                    <span class="text active">Thể loại</span>
                                                    <span class="cs-icon icon-minus"></span>
                                                </h3>
                                                <div class="sidebar-content">
                                                    <ul class="list-cat">
                                                        @foreach ($menu as $mn)
                                                                                                                 
                                                    <li><a href="{{route('page.Product',[$mn->id])}}">{{$mn->name}} </a></li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="sidebar-block latest-block">
                                                <h3 class="sidebar-title">
                                                    <span class="text">Mới nhất</span>
                                                    <span class="cs-icon icon-minus"></span>
                                                </h3>
                                                <div class="sidebar-content">
                                                    <div class="latest-inner">
                                                        @foreach ($products_new as $prn)
                                                        @php
                                                            $num_star = 0
                                                        @endphp
                                                        @if ($prn->total_rating>0)
                                                            @php
                                                                
                                                                $num_star = round($prn->number_star/$prn->total_rating);
                                                                
                                                            @endphp
                                                        @endif                                      
                                                        <div class="products-item">
                                                            <div class="row-container product-circle">
                                                                <div class="product home_product">
                                                                    <div class="row-left">
                                                                        <a href="{{route('page.Product_detail',[$prn->id])}}" class="container_item">
                                                                            <div class="hoverBorderWrapper">
                                                                            <img src="assets/images/product/{{$prn->image}}" class="not-rotation img-responsive front" alt="{{$prn->image}}">
                                                                                <div class="mask"></div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="row-right">

                                                                    <div class="product-title"><a class="title-5" href="{{route('page.Product_detail',[$prn->id])}}">{{$prn->name}}</a></div>
                                                                        <div class="rating-star">
                                                                            <span class="spr-badge" data-rating="5.0">
                                                                                <span class="spr-starrating spr-badge-starrating">
                                                                                    @for($i=1;$i<=5;$i++)
                                                                                    <i id="rating" class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                                                                                @endfor
                                                                                </span><span class="spr-badge-caption">{{$prn->total_rating}} đánh giá</span>
                                                                            </span>

                                                                        </div>
                                                                        <div class="product-price">
                                                                            @if ($prn->discount == 0)
                                                                            <span class="price_sale"><span class="money" data-currency-usd="{{number_format($prn->unit_price -($prn->unit_price * $prn->discount / 100)) }}" data-currency="VND"> {{number_format($prn->unit_price -($prn->unit_price * $prn->discount / 100)) }}đ</span></span>
                                                                            @else
                                                                            <span class="price_sale"><span class="money" data-currency-usd="{{number_format($prn->unit_price -($prn->unit_price * $prn->discount / 100)) }}" data-currency="VND"> {{number_format($prn->unit_price -($prn->unit_price * $prn->discount / 100)) }}đ</span></span>
                                                                                <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($prn->unit_price)}}" data-currency="VND">{{number_format($prn->unit_price)}}đ</span></del>
                                                                            @endif

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- filter tags group -->
                                           
                                           
                                            <div class="sidebar-block filter-block">
                                                <h3 class="sidebar-title">
                                                    <span class="text">Giá</span>
                                                    <span class="cs-icon icon-minus"></span>
                                                </h3>
                                                <div class="sidebar-content">
                                                    <ul class="filter-content ">
                                                    <li data-handle="under-100"><a href="{{request()->fullUrlWithQuery(['price'=>1])}}" title="Sản phẩm dưới 50.000"><span class="fe-checkbox"></span> Dưới 50.000</a></li>
                                                        <li data-handle="100-200"><a href="{{request()->fullUrlWithQuery(['price'=>2])}}" title="Sản phẩm từ 50.000 - 100.000"><span class="fe-checkbox"></span> 50.000 - 100.000</a></li>
                                                        <li data-handle="above-200"><a href="{{request()->fullUrlWithQuery(['price'=>3])}}" title="Sản phẩm trên 100.000"><span class="fe-checkbox"></span>Trên 100.000 </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                @yield('content_product')
                            </div>
                            <script type="text/javascript">
                                function active_review_form(){
                                    if($("#form_6537875078").attr('style')=='display: none;'){
                                        $("#form_6537875078").css('display','block');
                                    }
                                    else {
                                        $("#form_6537875078").css('display','none');
                                    }
                                }
                                jQuery(document).ready(function($){
                                    $('#gallery-images div.image').on('click', function() {
                                        var $this = $(this);
                                        var parent = $this.parents('#gallery-images');
                                        parent.find('.image').removeClass('active');
                                        $this.addClass('active');
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@endsection