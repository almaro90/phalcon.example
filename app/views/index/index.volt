
<div class="well" style="width:220px;margin:auto;margin-top:120px;">
	<h1>Login</h1>
	{{ form('session/login', 'method': 'post') }}
		{{ text_field('username','placeholder':'Username') }}<br>
		{{ password_field('password', 'placeholder':'Password') }}<br>
		{{ submit_button('Enviar', 'class':'btn btn-success btn-block') }}
	</form>
	{{ link_to('signup','Signup', 'class':'btn btn-primary btn-block') }}
</div>