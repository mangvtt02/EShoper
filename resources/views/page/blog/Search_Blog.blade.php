@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')


{{-- new --}}
<!-- Main Content -->
<div class="page-container" id="PageContainer">
	<main class="main-content" id="MainContent" role="main">
		<section class="heading-content">
			<div class="heading-wrapper">
				<div class="container">
					<div class="row">
						<div class="page-heading-inner heading-group">
							<div class="breadcrumb-group">
								<h1 class="hidden">Trang tìm kiếm blogs</h1>
								<div class="breadcrumb clearfix">
								<span ><a href="{{route('page.Home')}}" title="Trang chủ" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
									</span>
									<span class="arrow-space"></span>
									<span >
										<a href="javascript:void(0);" title="Trang tìm kiếm blogs" itemprop="url"><span itemprop="title">Tìm kiếm cho: "{{$kq}}"</span></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="search-content">
			<div class="search-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="search-content-group">
							<div class="search-content-inner">
								<div id="search">
									<div class="expanded-message">
										<div class="search-field">
											<form class="search" action="{{route('page.search_blogs')}}" style="position: relative;">
												<input type="hidden" name="type" value="blogs">
												<button class="search-submit" type="submit" name="search_blogs">
													<span class="cs-icon icon-search"></span>
												</button>
											<input type="text" name="q" class="search_box" placeholder="Tìm kiếm blogs ..." value="{{$kq}}" autocomplete="off">
											</form>
										</div>
										<span class="subtext">Kết quả tìm kiếm cho "<strong>{{$kq}}</strong>" cho thấy: </span>
										<span class="results">{{count($search)}} kết quả được tìm thấy</span>
									</div>
									<!-- Begin results -->
									<div class="product-item-group clearfix">
										<div class="product-item-inner">
											<!-- results article -->
											<!-- results product -->
											@foreach ($search as $s)
											<div class="product-item-wrapper col-sm-4">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-container product list-unstyled clearfix product-circle">
														<div class="row-left">
														<a href="{{route('page.Blog_Detail',[$s->id])}}" class="hoverBorder container_item">
																<div class="hoverBorderWrapper">
																<img src="assets/images/blog/{{$s->image}}" class="img-responsive front" alt="{{$s->image}}">
																	<div class="mask"></div>
																</div>
														</a>
															
														</div>
														<div class="row-right animMix">
															
															<div class="product-title"><a class="title-5" href="{{route('page.Blog_Detail',[$s->id])}}">{{$s->title}}</a></div>
															
														</div>
													</div>
													
												</div>
											</div>
											@endforeach
											
										</div>
									</div>
									<!-- End results -->
									<nav aria-label="Page navigation">
										<ul class="pagination">
											{!!$search->appends(['q'=>$kq])->render()!!}
										</ul>
									</nav>
									
								</div>
								<!-- /#search -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>
@endsection