<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>{{ CNF_APPNAME }} | {{ $pageTitle}}</title>
		<meta name="keywords" content="{{ $pageMetakey }}" />
		<meta name="description" content="{{ $pageMetadesc }}" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<link rel="shortcut icon" href="" type="image/x-icon">

		<!-- GOOGLE WEB FONTS  -->

		<!-- CORE CSS -->
		<link href="{{ asset('frontend') }}/default/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="{{ asset('frontend') }}/default/css/core.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('frontend') }}/default/css/default.css" rel="stylesheet" type="text/css" />
		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset('frontend') }}/default/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '{{ asset("frontend/default/plugins/") }}/';</script>
		<script type="text/javascript" src="{{ asset('frontend') }}/default/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/default/js/default.js"></script>
		<script type="text/javascript" src="{{ asset('static/js/plugins/parsley.js') }}"></script>
		<script type="text/javascript" src="{{ asset('static/js/plugins/jquery.jCombo.min.js') }}"></script>
	</head>

	<body class="smoothscroll enable-animation">


		<div id="wrapper">

			<!-- Top Bar -->
			<div id="topBar">
				<div class="container">

					<!-- right -->
					<ul class="top-links list-inline pull-right">
						@if(Auth::check())
						<li class="text-welcome hidden-xs">Welcome to {{ CNF_APPNAME }}, <strong> {{ Session::get('fid')}}</strong></li>
						<li>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="fa fa-user hidden-xs"></i> {{ Lang::get('core.m_myaccount') }}</a>
							<ul class="dropdown-menu pull-right">
								<li><a tabindex="-1" href="{{ url('dashboard') }}"><i class="fa fa-desktop"></i> Dashboard</a></li>
								<li><a tabindex="-1" href="{{ url('user/profile?view=frontend') }}"><i class="fa fa-user"></i> {{ Lang::get('core.m_profile') }}</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="{{ url('user/logout') }}"><i class="glyphicon glyphicon-off"></i> {{ Lang::get('core.m_logout') }}</a></li>
							</ul>
						</li>
						@else
						<li class="text-welcome hidden-xs">Hello , <strong>Guest</strong></li>
						<li>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="fa fa-user hidden-xs"></i>{{ Lang::get('core.m_myaccount') }}</a>
							<ul class="dropdown-menu pull-right">
								<li><a tabindex="-1" href="{{ url('user/profile?view=frontend') }}"><i class="fa fa-history"></i> {{ Lang::get('core.signin') }} </a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="{{ url('user/logout') }}"><i class="glyphicon glyphicon-off"></i> {{ Lang::get('core.signup') }}</a></li>
							</ul>
						</li>
						@endif
					</ul>

					<!-- left -->
					<ul class="top-links list-inline">
						@if(CNF_MULTILANG ==1)

							<?php
							$flag ='en';
							$langname = 'English';
							foreach(SiteHelpers::langOption() as $lang):
								if($lang['folder'] == $pageLang or $lang['folder'] == CNF_LANG) {
									$flag = $lang['folder'];
									$langname = $lang['name'];
								}
							endforeach;?>
						<li>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="{{ asset('static/images/flags/'.$flag.'.png') }}" width="16" height="11" alt="lang" /> {{ $langname }}</a>
							<ul class="dropdown-langs dropdown-menu">
								@foreach(SiteHelpers::langOption() as $lang)
								<li><a tabindex="-1" href="{{ url('home/lang/'.$lang['folder'])}}"><img class="flag-lang" src="{{ asset('static/images/flags/'.$lang['folder'].'.png') }}" width="16" height="11" alt="lang" /> {{  $lang['name'] }}</a></li>
								@endforeach

							</ul>
						</li>
						@endif
					</ul>

				</div>
			</div>
			<!-- /Top Bar -->

			<div id="header" class="sticky shadow-after-3 clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
							<a class="logo pull-left" style="font-size:30px;" href="{{ url('')}}">
							<img src="{{ asset('frontend/default/images/sximo_logo.png')}}" width="150" title="{{ CNF_APPNAME }} " style="height: 40px !important" />

							</a>

						@include('layouts/default/menu')

					</div>
					</header>
				</div>

			@if($filename !='home')
			<section class="page-header">
				<div class="container">

					<h1> {{ strtoupper($pageTitle) }}</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">{{ $pageTitle }}</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			@endif

			@include($pages)


			<!-- FOOTER -->
			<footer id="footer">
				<div class="container">

					<div class="row">

						<div class="col-md-3">
							<!-- Footer Logo -->
							<img class="footer-logo" src="assets/images/logo-footer.png" alt="" />

							<!-- Small Description -->
							<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

							<!-- Contact Address -->
							<address>
								<ul class="list-unstyled">
									<li class="footer-sprite address">
										PO Box 40125<br>
										My Street St, Bandung<br>
										Paradise E-5 Indonesia<br>
									</li>
									<li class="footer-sprite phone">
										Phone: +62-888-411-6522
									</li>
									<li class="footer-sprite email">
										<a href="mailto:support@yourname.com">support@company.com</a>
									</li>
								</ul>
							</address>
							<!-- /Contact Address -->

						</div>

						<div class="col-md-3">

							<!-- Latest Blog Post -->
							<h4 class="letter-spacing-1">LATEST NEWS</h4>
							<ul class="footer-posts list-unstyled">
								<li>
									<a href="#">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue</a>
									<small>29 June 2015</small>
								</li>
								<li>
									<a href="#">Nullam id dolor id nibh ultricies</a>
									<small>29 June 2015</small>
								</li>
								<li>
									<a href="#">Duis mollis, est non commodo luctus</a>
									<small>29 June 2015</small>
								</li>
							</ul>
							<!-- /Latest Blog Post -->

						</div>

						<div class="col-md-2">

							<!-- Links -->
							<h4 class="letter-spacing-1">EXPLORE SXIMO5</h4>
							<ul class="footer-links list-unstyled">
								<li><a href="{{ url('') }}">Home</a></li>
								<li><a href="{{ url('about-us') }}">About Us</a></li>
								<li><a href="{{ url('service') }}">Our Services</a></li>
								<li><a href="{{ url('contact-us') }}">Contact Us</a></li>
								<li><a href="{{ url('toc') }}"> Term of Condition </a></li>
								<li><a href="{{ url('privacy') }}">Privacy</a></li>
								<li><a href="#"> More Link Here</a></li>

							</ul>
							<!-- /Links -->

						</div>

						<div class="col-md-4">

							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1">KEEP IN TOUCH</h4>
							<p>Subscribe to Our Newsletter to get Important News &amp; Offers</p>


								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" id="email" name="email" class="form-control required" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>

							<!-- /Newsletter Form -->

							<!-- Social Icons -->
							<div class="margin-top-20">
								<a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-rss pull-left" data-toggle="tooltip" data-placement="top" title="Rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>

							</div>
							<!-- /Social Icons -->

						</div>

					</div>

				</div>

				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							<li><a href="{{ url('toc')}}">Terms &amp; Conditions</a></li>
							<li>&bull;</li>
							<li><a href="{{ url('privacy')}}">Privacy</a></li>
						</ul>
						&copy; All Rights Reserved, {{ CNF_APPNAME}}
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->
		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>
	</body>
</html>