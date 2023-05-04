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
                                <h1 class="hidden">Blogs</h1>
                                <div class="breadcrumb clearfix">
                                <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('page.Home')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
                                    </span>
                                    <span class="arrow-space"></span>
                                    <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a href="{{route('page.Blog')}}" title="Blogs" itemprop="url"><span itemprop="title">Blog</span></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @yield('Content')
                                    <div class="col-sm-3 sidebar-blog sidebar">
                                        <div class="sidebar-block blog-search">
                                            <div class="sidebar-content">
                                                <form class="search" action="{{route('page.search_blogs')}}" style="position: relative;">
                                                    <input type="hidden" name="type" value="blogs">
                                                    <input type="text" name="q" class="search_box" placeholder="Tìm kiếm tại đây ... " value="" autocomplete="off">
                                                    <button class="search-submit" type="submit">
                                                        <span class="cs-icon icon-search"></span>
                                                    </button>
                                                </form>
                                                <div class="search-results" style="position: absolute; left: 0px; top: 100%; display: none;"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="sidebar-block blogs-recent">
                                            <h3 class="sidebar-title">
                                                <span class="text">Bài đăng gần đây</span>
                                                <span class="cs-icon icon-minus"></span>
                                            </h3>
                                            <div class="sidebar-content recent-article">
                                                <div class="ra-item-inner">
                                                    @foreach ($blog_new as $bln)
                                                        
                                                    
                                                    <div class="ra-item">
                                                        <div class="article-left">
                                                        <img src="assets/images/blog/{{$bln->image}}" height="52" width="76" alt="{{$bln->image}}">
                                                        </div>
                                                        <div class="article-right">
                                                        <h5><a href="{{route('page.Blog_Detail',[$bln->id])}}">{{$bln->title}}</a></h5>
                                                            <span class="date">{{date_format($bln->created_at, "Y-m-d")}}</span>
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
        </section>
    </main>
</div>

@endsection