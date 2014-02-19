{{ content() }}
<table class="table table-striped">
	<tr>
		<th>ID</th><th>Username</th><th>Options</th>
	</tr>
	{% for user in users %}
		<tr>
			<td>{{ user.id }}</td>
			<td>{{ user.username }}</td>
			<td>
				<div class="btn-group">
				  <button class="btn btn-info">Info</button>
				  <button class="btn btn-warning">Edit</button>
				  <button class="btn btn-danger">Delete</button>
				</div>
			</td>
		</tr>
	{% endfor %}
</table>