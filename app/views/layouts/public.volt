<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		{{ stylesheet_link("css/bootstrap/bootstrap.min.css") }}
	</head>
	<body>
		<h6>public</h6>
		{{ content() }}
		{{ javascript_include("js/jquery/jquery.min.js") }}
		{{ javascript_include("js/bootstrap/bootstrap.min.js") }}
	</body>
</html>