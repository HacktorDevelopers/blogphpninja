<div class="card text-center">
	<div class="card-header">
		Featured
	</div>
<div class="card-body">
	<div class="card bg-dark text-white">
  			<img class="card-img" src="<?php echo site_url()."resources/images/logo.png"?>" alt="Card image">
		<div class="card-img-overlay text-dark">
			<h5 class="card-title ">Card title</h5>
			<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			<p class="card-text">Last updated 3 mins ago</p>
		</div>
	</div>
	<div class="card-footer text-muted">
    		2 days ago
	</div>
</div>
</div>

<div class="row">
<?php foreach($posts->result() as $post): ?>

<div class="col-md-3">
	<div class="card" style="width: 100%; margin-bottom: 5px">
		<img class="card-img-top" src="<?php echo site_url()."resources/images/logo.png"?>" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"><?php echo $post->title ?></h5>
			<h6 class="card-subtitle mb-2 text-muted">posted by <?php echo $post->author ?></h6>
			<p class="card-text"><?php echo character_limiter($post->content,10)?></p>
			<a href="<?php echo site_url()."post/".$post->post_id?>" class="card-link">Read full article</a>
			<div class="card-footer bg-transparent border-success">
				<a class="card-link"><span class="fa fa-comment text-danger"></span><?php echo nbs(4).$this->post->getNumberOfComment($post->post_id)?></a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
</div>
<div style="margin-bottom: 50px;">
	
</div>