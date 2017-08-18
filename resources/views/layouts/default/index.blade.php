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
						<li class="text-welcome hidden-xs">欢迎回来: <strong> {{ Session::get('fid')}}</strong></li>
						<li>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="fa fa-user hidden-xs"></i> {{ Lang::get('core.m_myaccount') }}</a>
							<ul class="dropdown-menu pull-right">
								<li><a tabindex="-1" href="{{ url('dashboard') }}"><i class="fa fa-desktop"></i> 管理后台</a></li>
								<li><a tabindex="-1" href="{{ url('user/profile?view=frontend') }}"><i class="fa fa-user"></i> {{ Lang::get('core.m_profile') }}</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="{{ url('user/logout') }}"><i class="glyphicon glyphicon-off"></i> {{ Lang::get('core.m_logout') }}</a></li>
							</ul>
						</li>
						@endif
					</ul>

					<!-- left -->
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
							<img src="{{ asset('frontend/default/images/logo-haocms.png')}}" width="150" title="{{ CNF_APPNAME }} " style="height: 40px !important" />

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
							<p>本页面内容为网站演示数据，其为{{ CNF_APPNAME }} 站点演示。.</p>

							<!-- Contact Address -->
							<address>
								<ul class="list-unstyled">
									<li class="footer-sprite address">
										邮编 707777<br>
										北京海淀区上地信息产业基地北区<br>
										7号地块<br>
									</li>
									<li class="footer-sprite phone">
										Phone: +86-888-888-8888
									</li>
									<li class="footer-sprite email">
										<a href="mailto:root@mofei.com">root@mofei.org</a>
									</li>
								</ul>
							</address>
							<!-- /Contact Address -->

						</div>

						<div class="col-md-3">

							<!-- Latest Blog Post -->
							<h4 class="letter-spacing-1">最新动态</h4>
							<ul class="footer-posts list-unstyled">
								<li>
									<a href="#">bate版本 0.1.0发布，完成laravel从到Yii的正式迁移并不断更新</a>
									<small>2017年08月</small>
								</li>
								<li>
									<a href="#">为使得项目更优雅, 选用laravel框架进行重构,以便于以后不断的更新升级</a>
									<small>2016年05月</small>
								</li>
								<li>
									<a href="#">{{ CNF_APPNAME }} 项目进入设计研发阶段,选用Yii2作为开发框架 </a>
									<small>2017年01月</small>
								</li>
							</ul>
							<!-- /Latest Blog Post -->

						</div>

						<div class="col-md-2">

							<!-- Links -->
							<h4 class="letter-spacing-1">网站地图</h4>
							<ul class="footer-links list-unstyled">
								<li><a href="{{ url('') }}">首页</a></li>
								<li><a href="{{ url('about-us') }}">关于我们</a></li>
								<li><a href="{{ url('service') }}">服务</a></li>
								<li><a href="{{ url('contact-us') }}">联系我们</a></li>
								<li><a href="{{ url('toc') }}"> 文档中心 </a></li>
								<li><a href="{{ url('privacy') }}">问题讨论</a></li>
								<li><a href="#"> 更多 >></a></li>

							</ul>
							<!-- /Links -->

						</div>

						<div class="col-md-4">

							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1">订阅分享</h4>
							<p>留下您的订阅邮箱, 我们将定期给您发送最新动态</p>


								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" id="email" name="email" class="form-control required" placeholder="输入邮箱地址">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">订阅</button>
									</span>
								</div>

							<!-- /Newsletter Form -->

							<!-- Social Icons -->
							<div class="margin-top-20">
								<a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-weibo"></i>
									<i class="icon-weibo"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="Google plus">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
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
							<li><a href="{{ url('toc')}}">地图</a></li>
							<li>&bull;</li>
							<li><a href="{{ url('privacy')}}">联系</a></li>
						</ul>
						Copyright &copy; 2016-2017 当使用本站时，代表您已接受了本站的使用条款和隐私条款。版权所有，保留一切权利。{{ CNF_APPNAME}}
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