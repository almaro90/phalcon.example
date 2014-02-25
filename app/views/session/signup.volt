{% extends "layouts/public.volt" %}
{% block content %}
<div class="well" style="width:220px;margin:auto;margin-top:120px;">
	<h1>SignUp</h1>
	{{ form('session/signup', 'method': 'post') }}
		{{ text_field('username','placeholder':'Username') }}<br>
		{{ password_field('password', 'placeholder':'Password') }}<br>
		{{ password_field('password_confirmation', 'placeholder':'Confirm Pass') }}<br>
		{{ submit_button('Enviar', 'class':'btn btn-success btn-block') }}
	</form>
	{{ link_to('session/login','Go to LOGIN', 'class':'btn btn-primary btn-block') }}
</div>
<div style="width:400px;margin:auto;margin-top:20px;">{{ content() }}</div>
{% endblock %}