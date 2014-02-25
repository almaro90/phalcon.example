{% extends "layouts/public.volt" %}

{% block head %}
	<style type="text/css">
		.auto {
			position: absolute;
			top:30px;
			left:0px;
		}

		.auto div {
			display:none;
		}
	</style>
{% endblock %}

{% block content %}
<div class="well" style="width:220px;margin:auto;margin-top:120px;">
	<h1>Login</h1>
	{{ form('session/login', 'method': 'post') }}
		{{ text_field('username','placeholder':'Username') }}<br>
		{{ password_field('password', 'placeholder':'Password') }}<br>
		{{ submit_button('Login', 'class':'btn btn-success btn-block') }}
	</form>
	{{ link_to('session/signup','Signup', 'class':'btn btn-primary btn-block') }}
</div>

<div style="width:400px;margin:auto;margin-top:20px;">{{ content() }}
 	<?php $this->flashSession->output() ?>
</div>
<div class="auto">
	<button class="btn tog"><i class="icon-chevron-right"></i></button>
	<div class="well">
		{{ form('session/auto', 'method':'post') }}
			<?php echo $form->render('id') ?><br>
			<?php echo $form->render('Auto') ?>
		</form>
	</div>
	<div class="alert alert-danger">
			{{ text_field('username', 'placeholder': 'Default will be User') }}<br>
			{{ text_field('number', 'placeholder': 'Default will be 30 created') }}<br>
			<button class="btn btn-danger reset">Reset and Seed</button>
	</div>
</div>
{% endblock %}

{% block scripts %}
	<script type="text/javascript">
		$(function(){
			$('.tog').click(function(){
				$('.auto div').slideToggle();
			});

			$('.reset').click(function(){
				$('.progress').remove();
				$('.auto .alert-danger').append('<div class="progress progress-striped active" style="display:block"><div class="bar" style="width: 100%;display:block"></div></div>');
				$.post('session/reset',{username: $('.alert-danger [name="username"]').val(), number: $('.alert-danger [name="number"]').val()}, function(){
					$('.progress').removeClass('.progress-striped active').find('.bar').addClass('bar-success');
					$('.auto .well').load('session/login .auto .well form');
					
				});
			});
		});
	</script>
{% endblock %}