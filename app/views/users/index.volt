{% extends 'layouts/private.volt' %}
{% block content %}
	<?php use Phalcon\Tag as Tag; ?>
	{{ content() }}
	<a href="{{ url("users/create") }}" class="btn btn-success btn-block"><i class="icon-user icon-white"></i> New User</a>
	<table class="table table-striped">
		<tr>
			<th>ID</th><th>Username</th><th>Created at</th><th>Options</th>
		</tr>
		<?php foreach($page->items as $user): ?>
			
				<tr>
					<td><?php echo $user->id ?></td>
					<td><?php echo $user->username ?></td>
					<td><?php echo $user->created_at ?></td>
					<td>
						<div class="btn-group">
						  <a href="{{ url("users/edit") }}/<?php echo $user->id ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Edit</a>
						  <a href="{{ url("users/delete") }}/<?php echo $user->id ?>" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</a>
						</div>
					</td>
				</tr>
			
		<?php endforeach; ?>
	</table>
	<div class="pagination pagination-large">
		<ul>
			<li><?php echo Tag::linkTo(array("users/index/","First")) ?></li>
			<?php
				$f = (($page->current - 5) < 1) ? 1 : $page->current - 5; 
				$l = (($page->current + 5) > $page->total_pages) ?$page->total_pages: $page->current + 5 ;
				$izq = $page->current -1;
				$der = $page->current +1; 
				if($f > 1)
					echo '<li class="disabled"><a href="#">...</a></li>';

				if($page->current != 1)
					echo '<li>' . Tag::linkTo(array("users/index/". $izq ,'<i class="icon-chevron-left"></i>')) . '</li>';
			?>
		  <?php for($i = $f; $i <= $l; $i++): ?>
		  	<?php if($page->current == $i): ?>
					<li class="active"><?php echo Tag::linkTo(array("users/index/".$i ,$i)) ?></li>
				<?php else: ?>
					<li><?php echo Tag::linkTo(array("users/index/".$i ,$i)) ?></li>
				<?php endif; ?>	
		  <?php endfor;
		  	if($l < $page->total_pages)
					echo '<li class="disabled"><a href="#">...</a></li>';

				if($page->current != $page->total_pages)
					echo '<li>'.Tag::linkTo(array("users/index/".$der ,'<i class="icon-chevron-right"></i>')).'</li>';
		  ?>
		  <li><?php echo Tag::linkTo(array("users/index/".$page->last,"Last")) ?></li>
	  </ul>
	</div>
{% endblock %}