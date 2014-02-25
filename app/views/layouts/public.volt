<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		{% block head %}{% endblock %}
		{{ stylesheet_link("css/bootstrap/bootstrap.min.css") }}
	</head>
	<body>
		{% block content %}{% endblock %}
		{{ javascript_include("js/jquery/jquery.min.js") }}
		{{ javascript_include("js/bootstrap/bootstrap.min.js") }}
		{% block scripts %}{% endblock %}
	</body>
</html>