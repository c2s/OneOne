<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ CNF_APPNAME }}</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

		<link href="{{ asset('static/js/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{ asset('static/css/sximo.css')}}" rel="stylesheet">
		<link href="{{ asset('static/css/animate.css')}}" rel="stylesheet">
		<link href="{{ asset('static/css/icons.min.css')}}" rel="stylesheet">
		<link href="{{ asset('static/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
		 <script src="//use.edgefonts.net/source-sans-pro.js"></script>

		<script type="text/javascript" src="{{ asset('static/js/plugins/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('static/js/plugins/parsley.js') }}"></script>
		<script type="text/javascript" src="{{ asset('static/js/plugins/bootstrap/js/bootstrap.js') }}"></script>
		<script type="text/javascript" src="{{ asset('static/js/plugins/jquery.form.js') }}"></script>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->	

		
	
  	</head>
<body class="gray-bg">
    <div class="middle-box  ">
        <div>

            @yield('content')	
        </div>
    </div>



</body> 
</html>