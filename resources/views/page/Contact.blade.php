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
                                <h1 class="hidden">Contact</h1>
                                <div class="breadcrumb clearfix">
                                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space"></span>
                                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a href="{{route('page.Contact')}}" title="Contact" itemprop="url"><span itemprop="title">Liên hệ</span></a>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-content">
            <div class="page-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="page-inner">
                            <div id="shopify-section-contact-template" class="shopify-section">
                                <div class="contact-content">

                                    <div class="google-maps-content ">
                                        <div class="google-maps-wrapper">
                                            <div class="page_title">
                                                <h2 class="title">
                                                    <span class="first">Liên</span>
                                                    <span class="last">Hệ</span>
                                                </h2>
                                                
                                            </div>
                                            {{-- errors --}}
                                            @if (count($errors)>0)
                                            <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->all() as $er)
                                                {{$er}}<br>
                                            @endforeach
                                            </div>
                                            @endif

                                            {{-- success --}}

                                            @if (session('success'))
                                            <div class="alert alert-success" role="alert">
                                            {{session('success')}}
                                            </div>
                                            @endif
                                            @foreach ($contact_info as $item)
                                                <iframe src="{{$item->address}}" width="1170" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="information_layout">
                                        <div class="information_inner">
                                            <div class="information_content">
                                                <div class="information_item col-sm-4">
                                                    <div class="page_title text_title">
                                                        <h2 class="title">Giờ mở cửa</h2>
                                                    </div>
                                                    <div style="text-align: center;" class="text_content">
                                                        <ul>
                                                            <li>
                                                                <div class="group_text">
                                                                    <span class="day">Thứ 2 – Thứ 4</span>
                                                                    <span class="time">8h - 22h</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="group_text">
                                                                    <span class="day">Thứ 5</span>
                                                                    <span class="time">8h - 22h30</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="group_text">
                                                                    <span class="day">Thứ 6</span>
                                                                    <span class="time">8h - 22h30</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="group_text">
                                                                    <span class="day">Thứ 7 - Chủ nhật</span>
                                                                    <span class="time">7h - 21h</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <div class="information_item col-sm-4">
                                                    <div class="page_title text_title">
                                                        <h2 class="title">Thông tin liên hệ</h2>
                                                    </div>
                                                    <div class="text_content">
                                                        @foreach ($contact_info as $item)
                                                        <div class="group_contact_info">
                                                            {{-- <div class="item">
                                                                <span>
                                                                    <i class="fa fa-home"></i><address>132 Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội</address>
                                                                </span>
                                                            </div> --}}
                                                            <div class="item phone-fax">
                                                                <span>
                                                                <i class="fa fa-phone"></i><a href="tel:{{$item->tel}}">{{$item->tel}}</a>
                                                                </span>
                                                                <span>
                                                                    <i class="fa fa-fax"></i><a href="fax:{{$item->fax}}">{{$item->fax}}</a>
                                                                </span>
                                                            </div>
                                                            <div class="item">
                                                                <span>
                                                                    <i class="fa fa-envelope-o"></i><a href="mailto:{{$item->email}}">{{$item->email}}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div> -->
                                                <div class="information_item col-sm-8">
                                                    <div class="page_title form_title">
                                                        <h2 class="title">Liên hệ với chúng tôi</h2>
                                                        <br>
                                                        <p>SĐT: +84 (09) xx xxx xxx<br>
                                                        Email: exampleemail123@gmail.com</p>
                                                    </div>
                                                    
                                                    <div class="form_content">
                                                    <form method="post" action="{{route('page.Post_Contact')}}" id="contact_form" class="contact-form" accept-charset="UTF-8">
                                                            
                                                            @csrf
                                                            <div id="contactFormWrapper" class="group_form">
                                                                <div class="col-md-6">
                                                                    <div class="form-item">
                                                                        <input type="text" id="contactFormName" name="name" placeholder="Họ và tên">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-item">
                                                                        <input type="email" id="contactFormEmail" name="email" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-item">
                                                                        <textarea rows="15" cols="75" id="contactFormMessage" name="messages" placeholder="Viết liên hệ"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-item">
                                                                        <input type="submit" id="contactFormSubmit" value="Gửi" class="_btn">
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
                                <script>
                                    $(window).ready(function($) {

                                        if (jQuery().gMap) {
                                            if ($('#contact_map').length) {
                                                $('#contact_map').gMap({
                                                    zoom: 17,
                                                    scrollwheel: false,
                                                    maptype: 'ROADMAP',
                                                    markers: [{
                                                        address: '474 Ontario St Toronto, ON M4X 1M7 Canada',
                                                        html: '_address'
                                                    }]
                                                });
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection