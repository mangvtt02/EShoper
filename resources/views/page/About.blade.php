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
                                <h1 class="hidden">Giới thiệu</h1>
                                <div class="breadcrumb clearfix">
                                    <span itemscope="" ><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title">Trang chủ</i></span></a>
                                    </span>
                                    <span class="arrow-space"></span>
                                    <span itemscope="" >
                                        <a href="javascript:void(0);" title="Giới thiệu" itemprop="url"><span itemprop="title">Giới thiệu</span></a>
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
                            <div id="shopify-section-about-template" class="shopify-section">
                                <div class="about-content">
                                    <div class="introduction_layout">
                                        <div class="introduction_inner">
                                            <div class="page_title">
                                                @foreach ($about as $item)
                                                    <p class="caption">{!!$item->title!!}</p>
                                                @endforeach
                                                
                                            </div>
                                            @foreach ($about as $item)
                                                <div class="introduction_content">
<<<<<<< HEAD
                                                <img src="assets/images/about/{{$item->image}}" alt="{{$item->image}}">
=======
                                                <img src="assets\images\1121.jpg">
                                                <img  style="display: none" src="assets/images/about/{{$item->image}}" alt="{{$item->image}}">
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                                    <div class="introduction_description">
                                                        {!!$item->content!!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="team_layout">
                                        <div class="page_title">
                                            <h2 class="title">
                                                <span class="first">ABOUT US</span>
                                            </h2>
                                        </div>
                                        <div class="team_inner">
                                            <div class="team_content">
                                                @foreach ($our_team as $item)
                                                <div class="team_item col-sm-4">

                                                    <div class="item_avatar">
                                                    <img src="assets/images/our_team/{{$item->image}}" alt="{{$item->image}}">
                                                    </div>
                                                    <div class="item_content">
                                                        <p class="item_name">
                                                            {{$item->name}}
                                                        </p>
                                                        <p class="item_position">
                                                            {{$item->position}}
                                                        </p>
                                                        <p class="item_description">
                                                            {!!$item->introduce!!}
                                                        </p>
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
        </section>
    </main>
</div>
@endsection