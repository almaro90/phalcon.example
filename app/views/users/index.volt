{% extends 'layouts/private.volt' %}
{% block content %}
	<?php use Phalcon\Tag as Tag; ?>
	{{ content() }}
	<a href="{{ url("users/create") }}" class="btn btn-success btn-block">New User</a>
	<table class="table table-striped">
		<tr>
			<th>ID</th><th>Username</th><th>Options</th>
		</tr>
		<?php foreach($page->items as $user): ?>
			
				<tr>
					<td><?php echo $user->id ?></td>
					<td><?php echo $user->username ?></td>
					<td>
						<div class="btn-group">
						  <a href="{{ url("users/edit") }}/<?php echo $user->id ?>" class="btn btn-warning">Edit</a>
						  <a href="{{ url("users/delete") }}/<?php echo $user->id ?>" class="btn btn-danger">Delete</a>
						</div>
					</td>
				</tr>
			
		<?php endforeach; ?>
	</table>

	<div class="pagination">
		<ul>
			<li><?php echo Tag::linkTo(array("users/index/","First")) ?></li>
		  <?php for($i = 1; $i <= $page->total_pages; $i++): ?>
		  	<?php if($page->current == $i): ?>
					<li class="active"><?php echo Tag::linkTo(array("users/index/".$i ,$i)) ?></li>
				<?php else: ?>
					<li><?php echo Tag::linkTo(array("users/index/".$i ,$i)) ?></li>
				<?php endif; ?>	
		  <?php endfor; ?>
		  <li><?php echo Tag::linkTo(array("users/index/".$page->last,"Last")) ?></li>
	  </ul>
	</div>
{% endblock %}