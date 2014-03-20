{% extends 'layouts/private.volt' %}
{% block content %}
	<h2>Create</h2>
	<form method="post" action="{{ url("users/create") }}" autocomplete="off">
	{{ form.render('username') }}<br>
	{{ form.render('password') }}<br>
	{{ form.render('password_confirmation') }}<br>
	{{ form.render('csrf', ['value':security.getToken()]) }}
	{{ form.render('edit') }}
	</form>
	{{ content() }}
{% endblock %}