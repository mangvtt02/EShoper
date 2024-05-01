@extends('page/blog/IndexBlog')

@section('Content')
    
<!-- Main Content -->
<section class="blog-content">
    <div class="blog-wrapper">
        <div class="container">
            <div class="row">
                <div id="shopify-section-blog-template" class="shopify-section">
                    <div class="blog-inner">
                        <div id="blog">
<div class="col-sm-9 articles">
    <div class="articles-group">
        <div class="articles-group-inner">
           
            <div class="article clearfix article-big">
                <div class="group-blog-top">
                    <div class="top-banner article_banner_show article-image">
                    <a href="{{route('page.Blog_Detail',[$blog1->id])}}">
                    <img src="assets/images/blog/{{$blog1->image}}" height="400" alt="{{$blog1->image}}">
                        </a>
                    </div>

                    <div class="article-title">
                        <h2 class="article-name"><a href="{{route('page.Blog_Detail',[$blog1->id])}}">{{$blog1->title}}</a></h2>
                    </div>
                    <ul class="article-info list-inline">
                        <li class="article-date">{{date_format($blog1->created_at, "Y-m-d")}}</li>
                        <li class="article-author">
                            <span>By</span> Admin
                        </li>
                        
                    </ul>
                </div>
                <div class="articleinfo_group">
                    <div class="article-content">
                        {!! $blog1->description !!}
                        
                    </div>
                    <a class="_btn" href="{{route('page.Blog_Detail',[$blog1->id])}}">Xem thêm</a>
                </div>
            </div>
           
            @foreach ($blog2 as $bl2)
                
           
            <div class="article clearfix article-small">
                <div class="group-blog-top">
                    <div class="top-banner article_banner_show article-image">
                        <a href="{{route('page.Blog_Detail',[$bl2->id])}}">
                        <img src="assets/images/blog/{{$bl2->image}}" style="height: 300px;" alt="{{$bl2->image}}">
                        </a>
                    </div>

                    <div class="article-title">
                        <h2 class="article-name"><a href="{{route('page.Blog_Detail',[$bl2->id])}}">{{$bl2->title}}</a></h2>
                    </div>
                    <ul class="article-info list-inline">
                        <li class="article-date">{{date_format($bl2->created_at, "Y-m-d")}}</li>
                        <li class="article-author">
                            <span>By</span> Admin
                        </li>
                        
                    </ul>
                </div>
                <div class="articleinfo_group">
                    <div class="article-content">
                        {!!$bl2->description!!}
                    </div>
                    <a class="_btn" href="{{route('page.Blog_Detail',[$bl2->id])}}">Xem thêm</a>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    <div class="pagination_group">
        <ul class="pagination ">
            
            {!!$blog2->render()!!}
        </ul>
    </div>
</div>

@endsection