<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Hello  , <b>{{ $row->first_name}} {{ $row->last_name }}</b> </p>
		<p> You have Message From <b>{{ CNF_APPNAME }}</b> , Bellow is Message Detail  </p>
		<p><b> Message :</b> </p>
		<div>
			{{ $note }}
		</div>
		
		<p> Thank You </p><br /><br />
		
		<h3>{{ CNF_APPNAME }}</h3> 
	</body>
</html>