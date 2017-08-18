<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>密码重置</h2>

		<div>
			点击链接去重置你的密码: {{ URL::to('user/reset', array($token)) }}.
		</div>
	</body>
</html>