<?php
	var_dump($posts->result());
?>
<h3><?php echo $title?></h3>

<a class="btn btn-primary" href="newp">Add Post</a>
<?php if (count($posts->result()) == 0): ?>
	<div class="alert alert-info">
		No Post
	</div>
<?php else:?>
<table class="table">
	<tr>
		<th>Post Id</th>
		<th>Post Title</th>
		<th>Author</th>
		<th>Actions</th>
	</tr>
	<?php foreach ($posts->result() as $post): ?>
	<tr>
		<td>Post Id</td>
		<td>Post Title</td>
		<td>Author</td>
		<td>Actions</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif;?>