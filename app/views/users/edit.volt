{{ content() }}
<h1>Editar</h1>
{{ form('users/edit', 'method': 'post') }}
	{{ text_field('username','placeholder':'Username') }}<br>
	{{ hidden_field('id') }}
	{{ password_field('password', 'placeholder':'Password') }}<br>
	{{ password_field('password_confirmation', 'placeholder':'Confirm Pass') }}<br>
	{{ submit_button('Editar', 'class':'btn btn-success') }}
</form>