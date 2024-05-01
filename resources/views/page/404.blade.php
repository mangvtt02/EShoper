@extends('index')
@section('body')
<body class="fastfood_1" >
@endsection
@section('mainContent')
	<!-- Main Content -->
	<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="page-404-layout">
				<div class="page-404-wrapper">
					<h1 class="hidden">Page not found</h1>
					<div class="container">
						<div class="row">
							<div class="page-404-inner">
								<div class="page-404-content">
									<div class="page-left col-sm-6">
										<h2>Page not found</h2>
										<p class="caption">Oh my gosh! you found it !!!</p>
										<p class="subtext">Looks like the page you're trying to visit doesn't exist. Please check the URL and try your lick again</p>
										<a class="_btn" href="{{route('page.Home')}}">Back to home page</a>
									</div>
									<div class="page-right col-sm-6">
										<form class="search" action="{{route('page.Search_products')}}" style="position: relative;">
											<input type="hidden" name="type" value="product">
											<input type="text" name="q" class="search_box" placeholder="Search our store ... " value="" autocomplete="off">
											<button class="search-submit" type="submit">
												<span class="cs-icon icon-search"></span>
											</button>
										</form>
										<!-- <ul class="page-list-collection">
											<li><a href="collections.html">Gà</a></li>
											<li><a href="collections.html">Hamburger</a></li>
											<li><a href="collections.html">Pizza </a></li>
											<li><a href="collections.html">Americano</a></li>
										</ul> -->
										<div class="search-results" style="position: absolute; left: 0px; top: 100%; display: none;"></div>
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