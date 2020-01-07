<!doctype html>
<html lang="en-US">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="images/favicon.ico"/>
        <title>{{ config('app.name', 'Laravel') }}</title>

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}" type="text/css" media="all"/>
		<link rel='stylesheet' href="{{ asset('css/prettyPhoto.css') }}" type='text/css' media='all'/>
		<link rel='stylesheet' href="{{ asset('css/slick.css') }}" type='text/css' media='all'/>
		<link rel="stylesheet" href="{{ asset('css/settings.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/agrox.css') }}" type="text/css" media="all"/>
		<link href="http://fonts.googleapis.com/css?family=Great+Vibes%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet"/>
		
	</head>
	<body>
		{{-- <div class="noo-spinner">
			<div class="spinner">
				<div class="cube1"></div>
				<div class="cube2"></div>
			</div>
		</div> --}}
		<!-- Mobile Screen -->
		<div id="menu-slideout" class="slideout-menu hidden-md-up">
			<div class="mobile-menu">
				<ul id="mobile-menu" class="menu">
					<li class="dropdown">
						<a href="#">Home</a>
						<i class="sub-menu-toggle fa fa-angle-down"></i>
						<ul class="sub-menu">
							<li class="active"><a href="index.html">Organik Main</a></li>
							<li><a href="index-fresh.html">Organik Fresh</a></li>
							<li><a href="index-shop.html">Organik Shop</a></li>
							<li><a href="index-store.html">Organik Store</a></li>
							<li><a href="index-farm.html">Organik Farm</a></li>
							<li><a href="index-house.html">Organik House</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#">Pages</a>
						<i class="sub-menu-toggle fa fa-angle-down"></i>
						<ul class="sub-menu">
							<li class="dropdown">
								<a href="#">About Us</a>
								<i class="sub-menu-toggle fa fa-angle-down"></i>
								<ul class="sub-menu">
									<li><a href="about-us.html">About us 01</a></li>
									<li><a href="about-us-2.html">About us 02</a></li>
								</ul>
							</li>
							<li><a href="gallery-freestyle.html">Gallery Freestyle</a></li>
							<li><a href="gallery-grid.html">Gallery Grid</a></li>
							<li><a href="404.html">404</a></li>
						</ul>
					</li>
					<li>
						<a href="shortcodes.html">Shortcodes</a>
					</li>
					<li class="dropdown">
						<a href="#">Shop</a>
						<i class="sub-menu-toggle fa fa-angle-down"></i>
						<ul class="sub-menu">
							<li><a href="my-account.html">My Account</a></li>
							<li><a href="cart-empty.html">Empty Cart</a></li>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="checkout.html">Check Out</a></li>
							<li><a href="wishlist.html">Wishlist</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="shop-list.html">Shop List</a></li>
							<li><a href="shop-detail.html">Single Product</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#">Blog</a>
						<i class="sub-menu-toggle fa fa-angle-down"></i>
						<ul class="sub-menu">
							<li><a href="blog.html">Blog List</a></li>
							<li><a href="blog-classic.html">Blog Classic</a></li>
							<li><a href="blog-masonry.html">Blog Masonry</a></li>
							<li><a href="blog-detail.html">Blog Single</a></li>
						</ul>
					</li>
					<li>
						<a href="contact-us.html">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="site">
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="topbar-text">
								<span>Work time: Monday - Friday: 08AM-06PM</span> 
								<span>Saturday - Sunday: 10AM-06PM</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="topbar-menu">
								<ul class="topbar-menu">
									<li class="dropdown">
										<a href="#">Languages</a>
										<ul class="sub-menu">
											<li><a href="#">English</a></li>
											<li><a href="#">Français</a></li>
										</ul>
									</li>
									<li><a href="{{ route('login') }}">Login</a></li>
									<li><a href="#">Register</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			@include('includes.navbar')

			<div id="main">
				@yield('content')
			</div>
			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<img src="{{ asset('images/footer_logo.png') }}" alt="" class="footer-logo" />
							<p>
								Welcome to AgroX. Our products are freshly harvested, washed ready for box and finally delivered from our family farm right to your doorstep.
							</p>
							<div class="footer-social">
								<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Infomation</h3>
								<ul>
									<li><a href="#">New Products</a></li>
									<li><a href="#">Top Sellers</a></li>
									<li><a href="#">Our Blog</a></li>
									<li><a href="#">About Our Shop</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Useful Link</h3>
								<ul>
									<li><a href="#">Our Team</a></li>
									<li><a href="#">Our Blog</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Secure Shopping</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Subscribe</h3>
								<p>
									Enter your email address for our mailing list to keep yourself updated.
								</p>
								<form class="newsletter">
									<input type="email" name="EMAIL" placeholder="Your email address" required="" />
									<button><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							Copyright © 2017 <a href="#">Organic Store</a> - All Rights Reserved.
						</div>
						<div class="col-md-4">
							<img src="{{ asset('images/footer_payment.png') }}" alt="" />
						</div>
					</div>
				</div>
				<div class="backtotop" id="backtotop"></div>
			</div>
		</div>

		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-migrate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/modernizr-2.7.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.isotope.init.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.video.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.slideanims.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.actions.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.kenburn.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.navigation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.migration.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/extensions/revolution.extension.parallax.min.js') }}"></script>
		
		{{-- Shop Details --}}
		<script type='text/javascript' src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
		<script type='text/javascript' src="{{ asset('js/jquery.prettyPhoto.init.min.js') }}"></script>
		<script type='text/javascript' src="{{ asset('js/slick.min.js') }}"></script>

		{{-- Shop.html --}}

		<script type="text/javascript" src="{{asset('js/core.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/widget.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/mouse.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/slider.min.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/jquery.ui.touch-punch.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/price-slider.js') }}"></script>
	</body>
</html>