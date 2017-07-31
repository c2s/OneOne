<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>你好 {{ $firstname }} , </h2>
		<p> 欢迎注册xxxx</p>
		<p> 请点击这个链接激活你的账号  <a href="{{ URL::to('user/activation?code='.$code) }}"> www.jisec.com/xxx</a></p>
		<p> 如果不能点击这个链接, 请复制在浏览器中打开 </p>
		<p> {{ URL::to('user/activation?code='.$code) }} </p> 
		<br /><br />
		
		{{ CNF_APPNAME }} 
	</body>
</html>