{% extends 'layouts/private.volt' %}
{% block content %}
	<h2>Editar</h2>
	<form method="post" action="{{ url("users/edit") }}" autocomplete="off">
	{{ form.render('id') }}
	{{ form.render('username') }}<br>
	{{ form.render('password') }}<br>
	{{ form.render('password_confirmation') }}<br>
	{{ form.render('csrf', ['value':security.getToken()]) }}
	{{ form.render('edit') }}
	</form>
{% endblock %}