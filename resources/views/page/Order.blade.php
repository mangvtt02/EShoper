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
                                <h1 class="hidden">Hóa đơn</h1>
                                <div class="breadcrumb clearfix">
                                <span ><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title">Trang chủ</i></span></a>
                                    </span>
                                    <span class="arrow-space"></span>
                                    <span >
                                        <a href="javascript:void(0);" title="Hóa đơn" itemprop="url"><span itemprop="title">Hóa đơn</span></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="order-layout">
            <div class="order-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="order-inner">
                            <div class="order-content">
                                <div class="order-id">
                                    <h2>#{{$or->id}}</h2>
                                </div>
                                <div class="order-address">
                                    <div id="order_payment" class="col-md-12 address-items">
                                        <h2 class="address-title"></h2>
                                        <div class="address-content">
                                            <div class="address-item">
                                                <span class="title">Phương thức</span>
                                                <span class="content">{{$or->payment}}</span>
                                            </div>
                                            <div class="address-item name">
                                                <span class="title">Tên khách hàng:</span>
                                            <span class="content">{{Auth::guard('emp')->user()->name}}</span>
                                            </div>
                                            <div class="address-item">
                                                <span class="title">Số điện thoại:</span>
                                            <span class="content">{{$or->customers->phone_nb}}</span>
                                            </div>
                                            <div class="address-item">
                                                <span class="title">Địa chỉ giao hàng:</span>
                                            <span class="content">{{$or->customers->address}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-info">
                                    <div class="order-info-inner">
                                        <table id="order_details" >
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Size</th>
                                                    <th>Màu sắc</th>
                                                    <th>Giá</th>
                                                    <th class="center">Số lượng</th>
                                                    <th class="total">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                @foreach ($or->order_detail as $tp)
                                                @php
                                                    $price = $tp->product->unit_price - ($tp->product->unit_price*$tp->product->discount)/100;
                                                    $total_price = $tp->quantity * $price;
                                                @endphp 
                                                <tr id="10324769618" class="odd">
                                                    <td class="td-product">{{$tp->product->name}}</td>
                                                    <td class="sku note">{{$tp->size->name}}</td>
                                                    <td class="sku note">{{$tp->topping->name}}</td>
                                                    <td class="quantity">{{number_format($price)}}đ</td>
                                                    <td class="total"><span class="money">{{$tp->quantity}}</span></td>
                                                    <td class="total"><span class="money">{{number_format($total_price)}}đ</span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr class="order_summary note">
                                                    <td class="td-label" colspan="5">Thành tiền:</td>
                                                    <td class="subtotal"><span class="money" >{{number_format($or->total-20000)}}đ</span></td>
                                                </tr>
                                                <tr class="order_summary note">
                                                    <td class="td-label" colspan="5">Phí ship:</td>
                                                    <td class="subtotal"><span class="money" >{{number_format(20000)}}đ</span></td>
                                                </tr>
                                                <tr class="order_summary note">
                                                    <td class="td-label" colspan="5">Tổng thành tiền:</td>
                                                    <td class="subtotal"><span class="money" >{{number_format($or->total)}}đ</span></td>
                                                </tr>
                                                
                                                <tr class="order_summary note">
                                                    <td class="td-label" colspan="5">Ghi chú:</td>
                                                    <td class="vat"><span class="money">{{$or->note}}</span></td>
                                                </tr>
                                                
                                            </tfoot>
                                        </table>
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
@stop