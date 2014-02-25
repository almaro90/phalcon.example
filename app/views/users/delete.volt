{% extends 'layouts/private.volt' %}
{% block content %}
	{{ content() }}
	<h1>Delete</h1>
	<div class="alert alert-danger">You are going to delete this user, are you sure?</div>
	<div class="well">
		<p><b>ID:</b> {{ user.id }}</p>
		<p><b>Username:</b> {{ user.username }}</p>
	</div>
	{{ form('users/delete', 'method': 'post') }}
		{{ hidden_field('id',"value":user.id) }}
		{{ submit_button('Yes', 'class':'btn btn-success') }}
	</form>
	<a class="btn btn-info" href="{{ url('users/index') }}">NO</a>
{% endblock %}