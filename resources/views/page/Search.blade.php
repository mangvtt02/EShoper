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
									<h1 class="hidden">Super Deal</h1>
									<div class="breadcrumb clearfix">
										<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index-2.html" title="Fast Food" itemprop="url"><span itemprop="title">Trang chủ</span></a>
										</span>
										<span class="arrow-space"></span>
										<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
											<a href="super-deal.html" title="Super Deal" itemprop="url"><span itemprop="title">Super Deal</span></a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="page-wrapper">
				<div class="container">
					<div class="row">
						<div class="page-inner">
							<div id="page">
								<div class="details">
									<div id="shopify-section-deals-template" class="shopify-section">
										<div class="products-deals">
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_1.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Juice Ice Tea</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_2.jpg" class="img-responsive front" alt="Coke">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-coke" data-comparehandle="coke"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<button class="_btn select-option" type="button" onclick="window.location='product.html';" title="Select Option">Select options</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Coke</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_3.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Juice Ice Tea</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_14.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Juice Ice Tea</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_4.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Veggie Lover’s</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_5.jpg" class="img-responsive front" alt="Coke">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-coke" data-wishlisthandle="coke"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="coke" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-coke" data-comparehandle="coke"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<button class="_btn select-option" type="button" onclick="window.location='product.html';" title="Select Option">Select options</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Hotdog</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_6.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Chicken Supreme</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
														</div>
													</div>
												</div>
											</div>
											<div class="product-item-wrapper col-sm-3">
												<div class="row-container product list-unstyled clearfix product-circle">
													<div class="row-left">
														<a href="product.html" class="hoverBorder container_item">
															<div class="hoverBorderWrapper">
																<img src="assets/images/product_16.jpg" class="img-responsive front" alt="Juice Ice Tea">
																<div class="mask"></div>
															</div>
														</a>
														<div class="hover-mask">
															<div class="group-mask">
																<div class="inner-mask">
																	<div class="group-actionbutton">
																		<ul class="quickview-wishlist-wrapper">
																			<li class="wishlist">
																				<a title="Add To Wishlist" class="wishlist wishlist-juice-ice-tea" data-wishlisthandle="juice-ice-tea"><span class="cs-icon icon-heart"></span></a>
																			</li>
																			<li class="quickview hidden-xs hidden-sm">
																				<div class="product-ajax-cart">
																					<span class="overlay_mask"></span>
																					<div data-handle="juice-ice-tea" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
																						<a class=""><span class="cs-icon icon-eye"></span></a>
																					</div>
																				</div>
																			</li>
																			<li class="compare">
																				<a title="Add To Compare" class="compare compare-juice-ice-tea" data-comparehandle="juice-ice-tea"><span class="cs-icon icon-retweet2"></span></a>
																			</li>
																		</ul>
																	</div>
																	<form action="http://demo.themeforshop.com/html_fastfood/cart.html" method="post">
																		<div class="effect-ajax-cart">
																			<input type="hidden" name="quantity" value="1">
																			<button class="_btn add-to-cart" data-parent=".parent-fly" type="submit" name="add" title="Add To Cart">Add to cart</button>
																		</div>
																	</form>
																</div>
																<!--inner-mask-->
															</div>
															<!--Group mask-->
														</div>
														<div class="product-label">
															<div class="label-element deal-label">
																<span>33%</span>
															</div>
														</div>
													</div>
													<div class="row-right animMix">
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
															</span>
														</div>
														<div class="product-title"><a class="title-5" href="product.html">Ultimate Cheese</a></div>
														<div class="product-price">
															<span class="price_sale"><span class="money" data-currency-usd="$10.00">$10.00</span></span>
															<del class="price_compare"> <span class="money" data-currency-usd="$15.00">$15.00</span></del>
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
		</main>
	</div>
@endsection