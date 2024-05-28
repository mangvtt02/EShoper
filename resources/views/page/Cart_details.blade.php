@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')
    
<!-- Main Content -->
<div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
        <section class="heading-content">
            <div class="heading-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="page-heading-inner heading-group">
                            <div class="breadcrumb-group">
                                <h1 class="hidden">Giỏ hàng của bạn</h1>
                                <div class="breadcrumb clearfix">
                                <span ><a href="{{route('page.Home')}}" title="Eshopper" itemprop="url"><span itemprop="title">Trang chủ</i></span></a>
                                    </span>
                                    <span class="arrow-space"></span>
                                    <span >
                                        <a href="javascript::void(0);" title="Giỏ hàng của bạn" itemprop="url"><span itemprop="title">Giỏ hàng của bạn</span></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cart-content">
            <div class="cart-wrapper">
                <div class="container">
                    <div class="row">
                        <div id="shopify-section-cart-template" class="shopify-section">
                            <div class="cart-inner">
                                <div id="cart">
                                    <div class="cart-form">
                                    <form action="{{route('page.post_check_out')}}" method="POST">
                                        @csrf
                                        
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="image" colspan="2">Sản phẩm</th>
                                                        <th class="price">Size</th> 
                                                        <th class="qty">Màu sắc</th>
                                                        <th class="price">Giá</th>
                                                        <th class="qty">Số lượng</th>
                                                        <th class="total">Tổng tiền</th>
                                                        <th class="remove">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($cart->items)>0)
                                                    @foreach ($cart->items as $items)
                                                        @php  
                                                            $price_sale = ($items['unit_price'] - ($items['unit_price'] * $items['discount'] )/100);
                                                            $price = ($items['unit_price'] - ($items['unit_price'] * $items['discount'] )/100) * $items['quantity'];
                                                        @endphp
                                                    <tr>
                                                        <td class="image">
                                                            <div class="product_image">
                                                            <a href="{{route('page.Product_detail',[$items['id']])}}">
                                                            <img src="assets/images/product/{{$items['image']}}" alt="{{$items['image']}}">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td class="image-info">
                                                            <div class="product_name">
                                                                <a href="{{route('page.Product_detail',[$items['id']])}}">
                                                                    {{$items['name']}}
                                                                </a>
                                                                
                                                            </div>
                                                        </td>

                                                        <td >
                                                            <span>
                                                                <div class="select clearfix">
                                                                    <div class="selector-wrapper variant-wrapper-size">
                                                                    <select class="single-option-selector" onchange="typeProductChange({{$items['id']}})" id='size_{{$items['id']}}' name="size_{{$items['id']}}" onchange="typeProductChange({{$items['id']}})">
                                                                        @foreach ($size as $s)
                                                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td >
                                                            @if ($items['type_product']['new'])
                                                           
                                                                <div class="product-options " >
                                                                    
                                                                    <div class="product-type">
                                                                        <div class="select clearfix">
                                                                            <select class="tp" id="topping_{{$items['id']}}" name="topping_{{$items['id']}}" onchange="typeProductChange({{$items['id']}})">
                                                                                <option value="0">Chọn Màu</option>
                                                                                @foreach ($topping as $tp)
                                                                                    <option value="{{$tp->id}}">{{$tp->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            @else
                                                                null

                                                            @endif
                                                        </td>
                                                        <td ><span class="money" >{{number_format($price_sale)}}</span>đ </td>
                                                        <td >
                                                            <div class="quantity-wrapper">
                                                                <div class="wrapper">
                                                                    <input type="text" size="4" onchange="typeProductChange({{$items['id']}})" name="quantity_{{$items['id']}}" id="quantity_{{$items['id']}}" value="{{$items['quantity']}}" class="tc item-quantity ">
                                                                </div>
                                                                <!--End wrapper-->
                                                            </div>
                                                            <!--End quantily wrapper-->
                                                        </td>
                                                    <td ><span class="money my-money " id="total_price_{{$items['id']}}">{{number_format($price)}}</span>đ</td>
                                                        
                                                        <td class="remove"><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{route('page.Delete_cart',[$items['id']])}}" class="cart"><span class="lnr lnr-trash"></span></a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    <tr class="summary">
                                                        <td class="total_label" colspan="6">Thanh toán</td>
                                                        <td class=" price float-left" colspan="1"><span class="total" id="total"><strong><span class="money" id="payment">{{number_format($cart->total())}}</span>đ</strong></span></td>
                                                        <td colspan="1"></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                       
                                            <div class="group-button">
                                            <a href="{{route('page.Home')}}" class="_btn">Tiếp tục mua sắm</a>
                                                <div class="group_btn_right">
                                                    <a type="button" class="_btn clearAllCart" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả không?')" href="{{route('page.Delete_all_cart')}}">Xóa tất cả  </a>
                                                  
                                                </div>
                                            </div>
                                            <div class="group-checkout-input">
                                              
                                                    <div class="shipping-calculator col-sm-6 col-xs-12 ">
                                                        <div id="shipping-calculator">
                                                            <h3>Thông tin giao hàng</h3>
                                                            <div class="group_form">
                                                                <div class="form-item">
                                                                    <label for="address">Địa chỉ *</label>
                                                                    <input type="text" name="address" id="address" value="{{$user->address}}" required>
                                                                </div>
                                                                <div class="form-item" id="address_province_container" style="">
                                                                    <label for="phone_nb" id="address_province_label">Số điện thoại *</label>
                                                                <input type="text" name="phone_nb" id="phone_nb" value="{{$user->SDT}}" required>
                                                                </div>
                                                            </div>
                                                           
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                  <legend class="col-form-label col-sm-6 pt-0">Phương thức thanh toán</legend>
                                                                  <div class="col-sm-10">
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" type="radio" name="method" id="method1" value="1" checked>
                                                                      <label class="form-check-label" for="method1">
                                                                        Thanh toán khi nhận hàng
                                                                      </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" type="radio" name="method" id="method2" value="0" >
                                                                      <label class="form-check-label" for="method2">
                                                                        Thanh toán online
                                                                      </label>
                                                                    </div>
                                                                    
                                                                  </div>
                                                                </div>
                                                              </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="checkout-buttons col-sm-6 col-xs-12">
                                                        <div class="note-content group_form">
                                                            <div class="form-item">
                                                                <label for="note">Thông tin bổ sung</label>
                                                                <textarea id="note" name="note" placeholder="Nhập thông tin tại đây ..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="checkout-content">
                                                            <div class="buttons clearfix">
                                                                <!-- <input type="submit" id="checkout"  class="_btn" name="checkout" value="Đặt hàng"> -->
                                                                <input type="submit" id="checkout"  class="_btn" name="redirect" value="Thanh toán" onclick="return validateForm()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    function validateForm() {
        var selectElements = document.querySelectorAll('.tp');
        for (var i = 0; i < selectElements.length; i++) {
            var selectedValue = selectElements[i].value;
            if (selectedValue === '0') {
                alert('Vui lòng chọn màu');
                return false;
            }
        }
        return true;
    }
</script>
<!-- <script type="text/javascript">

    function typeProductChange(productID){
        
        let topping = $("#topping_"+productID).val();
        let size = $("#size_"+productID).val();
        let quantity = $("#quantity_"+productID).val();
        if(topping && size){
            $.post('{{route('page.Post_Cart_details')}}', { _token: '{!! csrf_token() !!}',quantity:quantity,topping: topping, size:size,productID:productID}, function(res){
                var a = parseFloat(res).toLocaleString();
                $('#total_price_'+productID).html(a.replace(".",","));
                var t = 0;
                $(".my-money").each(function() {
                    t += parseFloat($(this).html().replace(/,/g, ''));
                });
                $("#payment").html(parseFloat(t).toLocaleString().replace(".",","));
            });
        }
        else{
            $.post('{{route('page.Post_Cart_details')}}', { _token: '{!! csrf_token() !!}',quantity:quantity,size: size,productID:productID}, function(res){
                 var a = parseFloat(res).toLocaleString();
                $('#total_price_'+productID).html(a.replace(".",","));
                var t = 0;
                $(".my-money").each(function() {
                   
                    t += parseFloat($(this).html().replace(/,/g, ''));
                });
                $("#payment").html(parseFloat(t).toLocaleString().replace(".",","));
            });
        }
    }
    
</script> -->
@endsection