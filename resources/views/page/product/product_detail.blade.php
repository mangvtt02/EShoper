@extends('page/product/index')
@section('content_product_de')
<style>
    .list_star i:hover{
        cursor: pointer;
    }
    .list_text{
        
        position: relative;
        background: #3366ff;
        color: #fff;
        display: none;
        margin-top: 10px;
        padding: 3px 5px;
        box-sizing: border-box;
        border-radius: 5px;
    }
    .list_star .rating_active{
        color: #ffc03f !important;
    }
    
</style>
<!-- Main Content -->
<div class="page-container" id="PageContainer">
<main class="main-content" id="MainContent" role="main">
<section class="heading-content">
<div class="heading-wrapper">
<div class="container">
<div class="row">
<div class="page-heading-inner heading-group">
<div class="breadcrumb-group">
<h1 class="hidden">Thông tin chi tiết</h1>
<div class="breadcrumb clearfix">
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
</span>
<span class="arrow-space"></span>
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
    <a href="javascript:void(0);" title="Thông tin chi tiết" itemprop="url"><span itemprop="title">Thông tin chi tiết</span></a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
    
@if ($pr_detail->total_rating>0)
    @php
        
        $num_star = round($pr_detail->number_star/$pr_detail->total_rating);
        
    @endphp
@else
    @php
         $num_star = 0
    @endphp
@endif  

<section class="product-detail-layout">
<div class="product-detail-wrapper">
<div class="container">
<div class="row">
<div id="shopify-section-product-template" class="shopify-section">
<div class="product-detail-inner" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Extra Crispy">
<meta itemprop="url" content="{{route('page.Product_detail',[$pr_detail->id])}}">
<meta itemprop="image" content="assets/images/product/{{$pr_detail->image}}">
<div class="product-detail-content col-sm-9">
<div id="product" class="extra-crispy-1 detail-content">
    <div class="col-md-12 info-detail-pro clearfix">
        <div class="col-md-6" id="product-image">
            <div id="featuted-image" class="image featured" style="position: static; overflow: visible;">
                <img src="assets/images/product/{{$pr_detail->image}}" class="zoomImg" alt="">
            </div>
            <div id="featuted-image-mobile" class="image featured-mobile">
                <div class="image-item">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" > 
                        <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy" data-item="1" />
                    </a>
                </div>
                <div class="image-item">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" > 
                        <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy" data-item="2" />
                    </a>
                </div>
                <div class="image-item">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" > 
                        <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy" data-item="3" />
                    </a>
                </div>
                <div class="image-item">
                    <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox" > 
                        <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy" data-item="4" />
                    </a>
                </div>
            </div>
            <div id="gallery-images" class="thumbs clearfix gallery-images-layout">
                <div class="gallery-images-inner">
                    <div class="show-image-load show-load-detail" style="display: none;">
                        <div class="show-image-load-inner">
                            <i class="fa fa-spinner fa-pulse fa-2x"></i>
                        </div>
                    </div>
                    <div class="slider-3itemsc vertical-image-content">
                        <div class="image-vertical image active">
                            <a href="assets/images/product/{{$pr_detail->image}}" class="cloud-zoom-gallery">
                                <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy">
                            </a>
                        </div>
                        <div class="image-vertical image">
                            <a href="assets/images/product/{{$pr_detail->image}}" class="cloud-zoom-gallery">
                                <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy">
                            </a>
                        </div>
                        <div class="image-vertical image">
                            <a href="assets/images/product/{{$pr_detail->image}}" class="cloud-zoom-gallery">
                                <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy">
                            </a>
                        </div>
                        <div class="image-vertical image">
                            <a href="assets/images/product/{{$pr_detail->image}}" class="cloud-zoom-gallery">
                                <img src="assets/images/product/{{$pr_detail->image}}" alt="Extra Crispy">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="product-information">
        <h1 itemprop="name" class="title">{{$pr_detail->name}}</h1>
            <div class="rating-content">
                <div class="rating-description">
                    <span class="spr-starratings spr-review-header-starratings">
                        @for($i=1;$i<=5;$i++)
                            <i  class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                        @endfor
                    </span>
                    <span class="spr-badge-caption">{{$pr_detail->total_rating}} đánh giá</span>								
                    <span class="review-link"><a href="#review">Viết đánh giá</a></span>
                </div>
            </div>
            <script>
                $('.review-link a').click(function(e) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $("#tabs-information").offset().top - 120
                    }, 800);
                    $('.nav-tabs a[href="#review"]').tab('show');
                    return false;
                });
            </script>
            <form id="add-item-form" @if (Auth::guard('emp')->check())
                action="{{route('page.Add_cart',[$pr_detail->id])}}" 
                @else
                action="{{route('page.Get_Login')}}"
            @endif  class="variants">
            
                <div class="product-options " itemprop="offers" itemscope="" >
                    <meta itemprop="priceCurrency" content="USD">
                    <link itemprop="availability" >
                    <div class="product-type">
                        <div class="select clearfix">
                            <div class="selector-wrapper variant-wrapper-size">
                                {{-- <label for="product-select-option-0"></label> --}}
                                {{-- <select class="single-option-selector" data-option="option1" id="product-select-option-0"><option value="Small">Small</option><option value="Medium">Medium</option><option value="Large">Large</option></select> --}}
                            </div>
                            <div class="selector-wrapper variant-wrapper-topping">
                                {{-- <label for="product-select-option-2"></label> --}}
                                {{-- <select class="single-option-selector" data-option="option3" id="quick-shop-variants-213223800871-option-2"><option value="Black Bottom Cupcakes">Black Bottom Cupcakes</option><option value="Blue-Ribbon Butter Cake">Blue-Ribbon Butter Cake</option><option value="Cheesy Mcplain">Cheesy Mcplain</option><option value="Chunky Apple Cake">Chunky Apple Cake</option></select> --}}
                            </div>
                        </div>
                        <div class="swatch-variant swatch color clearfix" data-option-index="1">
                            {{-- <label></label> --}}
                                {{--<div data-value="Black" class="swatch-element color black available active">
                                <input id="swatch-1-black" type="radio" name="option-1" value="Black">
                                <label data-toggle="tooltip" data-placement="top" data-original-title="Black" for="swatch-1-black" style="background-color: black; border-color: black; background-image: url(assets/images/black.png)">
                                    <img class="crossed-out" src="assets/images/soldout.png" alt="">
                                </label>
                            </div>
                            <div data-value="Red" class="swatch-element color red available">
                                <input id="swatch-1-red" type="radio" name="option-1" value="Red">
                                <label data-toggle="tooltip" data-placement="top" data-original-title="Red" for="swatch-1-red" style="background-color: red; border-color: red; background-image: url(assets/images/red.png)">
                                    <img class="crossed-out" src="assets/images/soldout.png" alt="">
                                </label>
                            </div>
                            <div data-value="Blue" class="swatch-element color blue available">
                                <input id="swatch-1-blue" type="radio" name="option-1" value="Blue">
                                <label data-toggle="tooltip" data-placement="top" data-original-title="Blue" for="swatch-1-blue" style="background-color: blue; border-color: blue; background-image: url(assets/images/blue.png)">
                                    <img class="crossed-out" src="assets/images/soldout.png" alt="">
                                </label>
                            </div>
                            <div data-value="yellow" class="swatch-element color yellow available soldout" style="display: none;">
                                <input id="swatch-1-yellow" type="radio" name="option-1" value="yellow" disabled="disabled">
                                <label data-toggle="tooltip" data-placement="top" data-original-title="Yellow" for="swatch-1-yellow" style="background-color: yellow; border-color: yellow; background-image: url(assets/images/yellow.png)">
                                    <img class="crossed-out" src="assets/images/soldout.png" alt="">
                                </label>
                            </div>
                            <script>
                                $(function() {
                                    $('.swatch-element').hover(
                                        function() {
                                            $(this).addClass("hovered");
                                        },
                                        function() {
                                            $(this).removeClass("hovered");
                                        });

                                    $(".swatch-element").click(function() {
                                        if (!$(this).hasClass('active')) {
                                            $(this).parent().find(".swatch-element.active").removeClass("active");
                                            $(this).addClass("active");
                                        }
                                    });
                                });
                            </script> --}}
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="quantity-wrapper">
                            <label class="wrapper-title">Số lượng</label>
                            <div class="wrapper">
                                <input id="quantity" type="text" name="quantity" value="1" maxlength="5" size="5" class="item-quantity">
                                <div class="qty-btn-vertical">
                                    <span class="qty-down fa fa-chevron-down" title="Decrease" data-src="#quantity">
                                    </span>
                                    <span class="qty-up fa fa-chevron-up" title="Increase" data-src="#quantity">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <br><br>
                        <br><br>
                    </div>
                    <div class="product-price">
                        <meta itemprop="price" content="{{number_format($pr_detail->unit_price -($pr_detail->unit_price * $pr_detail->discount / 100)) }}">
                        @if ($pr_detail->discount != 0)
                        <h2 class="price_sale" id="price-preview"><span class="money" data-currency-usd="{{number_format($pr_detail->unit_price -($pr_detail->unit_price * $pr_detail->discount / 100)) }}" data-currency="VND">{{number_format($pr_detail->unit_price -($pr_detail->unit_price * $pr_detail->discount / 100)) }}đ</span></h2>
                            <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($pr_detail->unit_price)}}" data-currency="VND">{{number_format($pr_detail->unit_price)}}đ</span></del>
                            
                        @else
                        <h2 class="price_sale" id="price-preview"><span class="money" data-currency-usd="{{number_format($pr_detail->unit_price -($pr_detail->unit_price * $pr_detail->discount / 100)) }}" data-currency="VND">{{number_format($pr_detail->unit_price -($pr_detail->unit_price * $pr_detail->discount / 100)) }}đ</span></h2>
                        @endif
                        
                    </div>
                    <div class="purchase-section multiple">
                        <div class="purchase">
                            {{-- <a class="_btn add-to-cart" id="add-to-cart" href="{{route('page.Add_cart',[$pr_detail->id])}}" title="Thêm vào giỏ hàng"><span class="cs-icon icon-menu"></span>Thêm vào giỏ hàng</a> --}}
                            
                            @if (!Auth::guard('emp')->check())
                            <a class="_btn add-to-cart"
                                href="{{route('page.Get_Login')}}" 
                               >Thêm vào giỏ hàng </a>
                            @else
                            <button id="add-to-cart" class="_btn add-to-cart" type="submit" name="add"><span><i class="cs-icon icon-cart"></i> Thêm vào giỏ hàng</a></span></button>
                            <div id="cart-animation" style="display:none">1</div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
           
            <div class="supports-fontface">
                <span class="social-title">Chia sẻ</span>
                <div class="social-sharing is-clean" data-permalink="https://cs-fastfood.myshopify.com/products/extra-crispy-1">
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-facebook">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a target="_blank" href="http://twitter.com/share?text=Extra%20Crispy&amp;url=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-twitter">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a target="_blank" href="../../pinterest.com/pin/create/button/indexb5c7.html?url=https://cs-fastfood.myshopify.com/products/extra-crispy-1&amp;media=http://cdn.shopify.com/s/files/1/2487/3424/products/13_1024x1024.jpg?v=1508991313&amp;description=Extra%20Crispy" class="share-pinterest">
                        <span class="fa fa-pinterest"></span>
                    </a>
                    <a target="_blank" href="http://plus.google.com/share?url=https://cs-fastfood.myshopify.com/products/extra-crispy-1" class="share-google">
                        <!-- Cannot get Google+ share count with JS yet -->
                        <span class="fa fa-google-plus"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="may-like-products col-sm-12">
        <div class="sub-title">
            <h2>Có thể bạn cũng thích</h2>
        </div>
        <div class="may-like-content-inner">
            <div class="may-like-content">
                @foreach ($pr_random as $pr_r)
                                                        
                <div class="content_product">
                    <div class="row-container product list-unstyled clearfix product-circle">
                        <div class="row-left">
                        <a href="{{route('page.Product_detail',[$pr_r->id])}}" class="hoverBorder container_item">
                                <div class="hoverBorderWrapper">
                                <img src="assets/images/product/{{$pr_r->image}}" class="img-responsive front" alt="{{$pr_r->image}}">
                                    <div class="mask"></div>
                                </div>
                        </a>
                            
                            @if ($pr_r->discount != 0)
                            <div class="product-label">                                                                   
                                <div class="label-element new-label">
                                    
                                    <span>{{$pr_r->discount}}%</span>
                                </div>  
                            </div>
                            @endif
                        </div>
                        <div class="row-right animMix">
                            <div class="rating-star">
                                @if ($pr_r->total_rating>0)
                                @php
                                    
                                    $num_star_r = round($pr_r->number_star/$pr_r->total_rating);
                                    
                                @endphp
                            @else
                                @php
                                     $num_star_r = 0
                                @endphp
                            @endif  
                                <span class="spr-starratings spr-review-header-starratings">
                                    @for($i=1;$i<=5;$i++)
                                        <i  class="spr-icon spr-icon-star {{$i <= $num_star_r ? 'active_star' : ''}} " ></i>
                                    @endfor
                                </span>
                               
                            </div>
                        <div class="product-title"><a class="title-5" href="{{route('page.Product_detail',[$pr_r->id])}}">{{$pr_r->name}}</a></div>
                            <div class="product-price">
                                
                                <span class="price">
                                    @if ($pr_r->discount != 0)
                                   
                                    <span class="price_sale" ><span class="money" data-currency-usd="{{number_format($pr_r->unit_price -($pr_r->unit_price * $pr_r->discount / 100)) }}" data-currency="VND">{{number_format($pr_r->unit_price -($pr_r->unit_price * $pr_r->discount / 100)) }}đ</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="{{number_format($pr_r->unit_price)}}" data-currency="VND">{{number_format($pr_r->unit_price)}}đ</span></del>
                                        
                                    @else
                                    <span class="price_sale" ><span class="money" data-currency-usd="{{number_format($pr_r->unit_price -($pr_r->unit_price * $pr_r->discount / 100)) }}" data-currency="VND">{{number_format($pr_r->unit_price -($pr_r->unit_price * $pr_r->discount / 100)) }}đ</span></span>
                                    @endif
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                
            </div>
        </div>
    </div>
    <div id="tabs-information" class="col-md-12 tabs-information">
        <div class="col-md-12 tabs-title">
            <ul class="nav nav-tabs tabs-left sideways">
                <li class="active"><a href="#desc" data-toggle="tab">Mô tả</a></li>
                <li><a href="#review" data-toggle="tab">Đánh giá</a></li>
                
            </ul>
        </div>
        <div class="col-md-12 tabs-content">
            <div class="tab-content">
                <div class="tab-pane active" id="desc">
                    
                    {!!$pr_detail->description!!}
                </div>
                <div class="tab-pane fade " id="review">
                    <div id="customer_review">
                        <div class="preview_content">
                            <div id="shopify-product-reviews" data-id="6537875078">
                                <div class="spr-container">
                                    <div class="spr-header">
                                        <h2 class="spr-header-title">Đánh giá của khách hàng</h2>
                                        <div class="spr-summary" itemscope="" itemtype="http://data-vocabulary.org/Review-aggregate">
                                            <meta itemprop="itemreviewed" content="Chanel, the cheetah">
                                            <meta itemprop="votes" content="1">
                                            <span itemprop="rating" itemscope="" itemtype="http://data-vocabulary.org/Rating" class="spr-starrating spr-summary-starrating">
                                                <meta itemprop="average" content="5.0">
                                                <meta itemprop="best" content="5">
                                                <meta itemprop="worst" content="1">
                                                    @for($i=1;$i<=5;$i++)
                                                        <i class="spr-icon spr-icon-star {{$i<=$num_star ? 'active_star' : ''}}" ></i>
                                                    @endfor
                                            </span>
                                            <span class="spr-summary-caption">
                                                <span class="spr-summary-actions-togglereviews">Dựa trên {{$pr_detail->total_rating}} đánh giá</span>
                                            </span>
                                            <span class="spr-summary-actions">
                                                <a  @if (!Auth::guard('emp')->check())
                                                    href="{{route('page.Login')}}"
                                                    @else
                                                    onclick="active_review_form();return false"
                                                @endif class="spr-summary-actions-newreview" >Để lại đánh giá</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="spr-content">
                                        @if (Auth::guard('emp')->check())

                                        <div class="spr-form" id="form_6537875078" style="display: none;">
                                        
                                            <form method="post" action="{{route('page.Review',[$pr_detail->id])}}" id="new-review-form_6537875078" class="new-review-form" ><input type="hidden" name="review[rating]"><input type="hidden" name="product_id" value="6537875078">
                                                <h3 class="spr-form-title">Viết đánh giá</h3>
                                                @csrf
                                                <fieldset class="spr-form-review">
                                                    <div class="spr-form-review-rating">
                                                        <label class="spr-form-label">Đánh giá</label>
                                                        <div class="rating-description">
                                                            <span class="spr-badge" data-rating="5.0">
                                                                <span class="spr-starrating spr-badge-starrating list_star">
                                                                    @for($i=1;$i<=5;$i++)
                                                                    <i id="rating" class="spr-icon spr-icon-star" data-key="{{$i}}"></i>
                                                                    @endfor
                                                                </span>
                                                                <span class="spr-badge-caption list_text" >Tốt</span>
                                                                <input type="hidden" class="number_rating">
                                                            </span>											
                                                            <span class="review-link"><a href="#review">Viết đánh giá</a></span>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="spr-form-review-title">
                                                        <label class="spr-form-label" for="review_title_6537875078">Tiêu đề đánh giá</label>
                                                        <input class="spr-form-input spr-form-input-text " id="review_title_6537875078" type="text" name="title" value="" placeholder="Đặt tiêu đề cho bài đánh giá">
                                                    </div>
                                                    <div class="spr-form-review-body">
                                                        <label class="spr-form-label" for="review_body_6537875078">Nội dung đánh giá<span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                        <div class="spr-form-input">
                                                            <textarea class="spr-form-input spr-form-input-textarea " id="review_body_6537875078" data-product-id="6537875078" name=content rows="10" placeholder="Viết đánh giá tại đây"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="spr-form-actions">
                                                    <input type="button" id="rating_prouct" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Gửi đánh giá">
                                                </fieldset>
                                            </form>
                                        
                                        
                                        
                                        </div>
                                        @endif
                                        <div class="spr-reviews" id="reviews_6537875078">
                                            @foreach ($pr_detail->comments as $item)
                                            <div class="spr-review" id="spr-review-7003642">
                                                <div class="spr-review-header">
                                                    <span class="spr-starratings spr-review-header-starratings">
                                                        @for($i=1;$i<=5;$i++)
                                                            <i class="spr-icon spr-icon-star {{$i<=$item->number_star ? 'active_star' : ''}}" ></i>
                                                        @endfor
                                                    </span>
                                                <h3 class="spr-review-header-title">{{$item->title}}</h3>
                                               
                                                <span class="spr-review-header-byline"><strong>{{$item->users->name}}<br></strong> lúc <strong>{{date_format($item->created_at,"d-m-Y")}}</strong></span>
                                                </div>
                                                <div class="spr-review-content">
                                                    <p class="spr-review-content-body">{{$item->content}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
</div>

<script>
$(function () {

    let star = $('.list_star #rating');

    rating = {
        1 : 'Không thích',
        2 : 'Tạm được',
        3 : 'Bình thường',
        4 : 'Rất ngon',
        5 : 'Tuyệt vời quá'
    }

    star.mouseover(function () { 
        let $this = $(this);
        let number = $this.attr('data-key');
        $(".number_rating").val(number);
        star.removeClass('rating_active');
        
        $.each(star, function (key, value) { 
             if( key+1 <= number){
                 $(this).addClass('rating_active')
             }
             
        });
        $(".list_text").text('').text(rating[number]).show();

       
    });
    $("#rating_prouct").click(function(e){
          
          //event.preventDefault();
          let content = $('#review_body_6537875078').val();
          let title = $('#review_title_6537875078').val();
          let number = $(".number_rating").val();

          if(content && title && number){
           $.ajax({
           url: '{{route('page.Review',[$pr_detail->id])}}',
           type: 'POST',
           data: {
               _token: '{!! csrf_token() !!}',
               'content':content,
               'title':title,
               'number': number
           },
           }).done(function(result) {
                location.reload();
           });
          }
          
      });
});

</script>

@endsection