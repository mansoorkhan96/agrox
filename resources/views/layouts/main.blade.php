<!doctype html>
<html lang="en-US">

<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		{{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *;**script-src 'self' http://localhost:8000 'unsafe-inline' 'unsafe-eval';** "> --}}

		{{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://localhost:8000; object-src 'self'" /> --}}

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
		<link href="{{ asset('assets/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('css/agrox.css') }}" type="text/css" media="all"/>
		<link rel="stylesheet" href="{{ asset('css/phonegap.css') }}" type="text/css" media="all"/>
		<link href="http://fonts.googleapis.com/css?family=Great+Vibes%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet"/>
		@yield('head')
	</head>
	<body>
		<!-- Mobile Screen -->
		<div id="menu-slideout" class="slideout-menu hidden-md-up">
			<div class="mobile-menu">
				<ul id="mobile-menu" class="menu">
					<li class="{{ request()->is('/') ? 'active' : '' }}">
						<a href="{{ route('home') }}">Home</a>
					</li>
					<li>
						<a href="{{ route('shop.index') }}">Shop</a>
					</li>
					<li>
						<a href="{{ route('blog.index') }}">Blog</a>
					</li>
					<li>
						<a href="{{ route('forum.index') }}">Forum</a>
					</li>
					<li>
						<a href="{{ route('consultancies.index') }}">Consultancies</a>
					</li>
					<li>
						<a href="{{ route('pages.contact') }}">Contact</a>
					</li>
					<li>
						<a href="{{ route('pages.about') }}">About Us</a>
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
								<span>AgroX</span> 
								<span>Agricultural Exploration</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="topbar-menu">
								<ul class="topbar-menu">
									@auth
										@if (auth()->user()->role_id == 1)
											<li><a href="{{ route('admin.index') }}">Dashboard</a></li>
										@elseif (auth()->user()->role_id == 2)
											<li><a href="{{ route('farmer.index') }}">Dashboard</a></li>
										@elseif (auth()->user()->role_id == 3)
											<li><a href="{{ route('consultant.index') }}">Dashboard</a></li>
										@elseif (auth()->user()->role_id == 4)
											<li><a href="{{ route('academic.index') }}">Dashboard</a></li>
										@else
											<li><a href="{{ route('profile.show', auth()->user()->id) }}"><img class="img-circle front-profile" src="{{ avatar(auth()->user()->avatar) }}" alt=""></a></li>
											<li><a href="{{ route('order.index') }}">My Orders</a></li>
										@endif
										<li>
											<a href="{{ route('logout') }}" 
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
												LogOut
											</a>
										</li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									@else 
									<li><a href="{{ route('login') }}">Login</a></li>
									<li><a href="{{ route('register') }}">Register</a></li>
									@endauth
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
									<li><a href="{{ route('shop.index') }}">New Products</a></li>
									<li><a href="{{ route('shop.index') }}">Top Sellers</a></li>
									<li><a href="{{ route('blog.index') }}">Our Blog</a></li>
									<li><a href="{{ route('pages.about') }}">About Our Shop</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">Useful Links</h3>
								<ul>
									<li><a href="{{ route('pages.about') }}">Our Team</a></li>
									<li><a href="{{ route('blog.index') }}">Our Blog</a></li>
									<li><a href="{{ route('pages.about') }}">About Us</a></li>
									<li><a href="{{ route('shop.index') }}">Secure Shopping</a></li>
									<li><a href="{{ route('pages.other') }}">Other</a></li>
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
							Copyright © {{date('Y')}} <a href="{{ route('home') }}">AgroX</a> - All Rights Reserved.
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

		<script>
			$(document).ready(function() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			});
		</script>

		<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
		@include('includes.message')
		
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

		@yield('page_script')

		<script>
			// $(document).ready(function() {
			// 	$(document).on('submit', '#add_to_cart', function() {
			// 		let formData = $(this.).serialize();

			// 		$.ajax({
			// 			url: "{{ route('cart.store') }}",
			// 			method: 'POST',
			// 			data: formData,
			// 			processData: false
			// 		}).done(function(data) {
			// 			if(data.status == true);
			// 		});
			// 	})
			// });
		</script>
	</body>
</html>