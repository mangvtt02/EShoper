
@extends('page/blog/IndexBlog')

@section('Content')
<!-- Main Content -->
<section class="article-content">
    <div class="article-wrapper">
        <div class="container">
            <div class="row">
                <div id="shopify-section-article-template" class="shopify-section">
                    <div class="article-inner" itemscope="" itemtype="http://schema.org/NewsArticle">
                        <meta itemprop="datePublished" content="2017-10-26 22:43:08 -0400">
                        <meta itemprop="dateModified" content="2017-10-26 22:47:00 -0400">
                        <meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="/blogs/news/the-art-of-food-22">

                        <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                            <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                <meta itemprop="url" content="assets/images/blog/{{$blog->image}}">
                            </div>
                            <meta itemprop="name" content="Shopify">
                        </div>
                        <div id="article">
                            <div class="col-sm-9 article">
                                <!-- Begin article -->
                                <div class="article-body clearfix">
                                    <div class="group-blog-top">
                                        <div class="top-banner article_banner_show article-image" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
                                            <img src="assets/images/blog/{{$blog->image}}" alt="{{$blog->image}}" height="400">
                                        <meta itemprop="url" content="assets/images/blog/{{$blog->image}}">
                                            <meta itemprop="width" content="863">
                                            <meta itemprop="height" content="575">
                                        </div>
                                        <div class="article-title">
                                            <h1 class="article-name" itemprop="headline">{{$blog->title}}</h1>
                                        </div>
                                        <ul class="article-info list-inline">
                                            <li class="article-date"><span>{{$blog->created_at}}</span></li>
                                            <li class="article-author" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                                <span>By</span>
                                                <span itemprop="name"> Admin</span>
                                            </li>
                                            <li class="article-comment">
                                                <span>
                                                    <a >
                                                        <span>{{count($comment)}}</span> Comment(s)
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="articleinfo_group">
                                        <div id="article-content" itemprop="description">
                                            
                                            {!!$blog->content!!}
                                        </div>
                                        <div class="group-blog-btm">
                                            <div class="share-with supports-fontface">
                                                <span class="btm-title">Chia sẻ: </span>
                                                <div class="social-blog social-sharing is-clean" data-permalink="https://cs-fastfood.myshopify.com">
                                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=https://cs-fastfood.myshopify.com" class="share-facebook">
                                                        <span class="fa fa-facebook"></span>
                                                    </a>
                                                    <a target="_blank" href="http://twitter.com/share?text=&amp;url=https://cs-fastfood.myshopify.com" class="share-twitter">
                                                        <span class="fa fa-twitter"></span>
                                                    </a>
                                                    <a target="_blank" href="../../pinterest.com/pin/create/button/index1a2a.html?url=https://cs-fastfood.myshopify.com&amp;media=http://cdn.shopify.com/s/files/1/2487/3424/articles/37_1024x1024.jpg?v=1509072491&amp;description=" class="share-pinterest">
                                                        <span class="fa fa-pinterest"></span>
                                                    </a>
                                                    <a target="_blank" href="http://plus.google.com/share?url=https://cs-fastfood.myshopify.com" class="share-google">
                                                        <!-- Cannot get Google+ share count with JS yet -->
                                                        <span class="fa fa-google-plus"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End article -->
                                <!-- Related Posts  -->
                                <div class="related-body clearfix">
                                    <span class="related-title">Bài đăng liên quan</span>
                                    <div class="related-content">
                                        <div class="related-content-inner related-blog-slider">
                                            @foreach ($blog2 as $bl2)
                                                
                                           
                                            <div class="related-inner">
                                                <div class="related-group article">
                                                    <div class="related-left">
                                                    <img src="assets/images/blog/{{$bl2->image}}" alt="{{$bl2->image}}" height="300">
                                                    </div>
                                                    <div class="related-right">
                                                        <div class="article-title">
                                                        <h2 class="article-name"><a href="{{route('page.Blog_Detail',[$bl2->id])}}">{{$bl2->title}}</a></h2>
                                                        </div>
                                                        <ul class="article-info list-inline">
                                                            <li class="article-date"><span>{{$bl2->created_at}}</span></li>
                                                            <li class="article-author" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                                                <span>By</span>
                                                                <span itemprop="name">Admin</span>
                                                            </li>
                                                        </ul>
                                                        <div class="article-content">
                                                            {!! $bl2->description !!}
                                                        </div>
                                                        <a class="_btn" href="{{route('page.Blog_Detail',[$bl2->id])}}">Xem thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Related Posts -->
                                <!-- Begin comments -->
                                <div id="comments" class="comments">
                                    <ul class="nav nav-tabs" >
                                        <li class="comment-title active">
                                            <a href="#comment_tab_1" data-toggle="tab" >
                                                Bình luận
                                            </a>
                                        </li>
                                        <li class="comment-title">
                                            <a href="#comment_tab_2" data-toggle="tab">
                                                Để lại bình luận
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="comment_tab_1">
                                            @foreach ($comment as $cm)
                                                
                                            
                                            <div class="comment border-bottom clearfix">
                                            <div class="cmt-author"><b>{{$cm->users->name}}</b></div>
                                                <div class="cmt-date">
                                                    <span class="date-day">
                                                        {{date_format($cm->created_at,"d-m-Y")}}  
                                                    </span>
                                                </div>
                                                <div class="cmt-content">
                                                <p>{{$cm->comment}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @if (Auth::guard('emp')->check())
                                            <div class="tab-pane" id="comment_tab_2">
                                                
                                                <form method="post" action="{{route('page.Comment_Blog',[$blog->id])}}" id="comment_form" class="comment-form" accept-charset="UTF-8">
                                            
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
                                                    @csrf
                                                    <div class="group_form">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label for="comment_body">Bình luận</label>
                                                                <textarea id="comment_body" name="comment" cols="40" rows="5" class="text"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="submit" value="Gửi bình luận" class="_btn" id="comment-submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- End comments -->
                            </div>
@endsection