<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
		{{ stylesheet_link("css/bootstrap/bootstrap.min.css") }}
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Phalcon Example</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            	<li class="active"><a href="#">Logged as <?php echo $this->session->get('auth')['username'] ?></a></li>
              <li><a href="{{ url("session/end") }}">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

		<div style="max-width:1200px;margin:auto;margin-top:60px;">
			<div style="float:left; width:150px;">
				<ul class="nav nav-list">
				  <li class="nav-header">Categories</li>
				  <li><a href="{{ url("index") }}">Home</a></li>
				  <li><a href="{{ url("users/index") }}">CRUD Users</a></li>
				</ul>				
			</div>
			<div style="float:left; margin-left:30px; width:80%">
				{% block content %}
				{% endblock %}
			</div>
		</div>
		{{ javascript_include("js/jquery/jquery.min.js") }}
		{{ javascript_include("js/bootstrap/bootstrap.min.js") }}
		{% block scripts %}{% endblock %}
	</body>
</html>