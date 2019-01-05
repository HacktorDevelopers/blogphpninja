<div class="card text-center">
	<div class="card-header">
		Latest Featured
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
    		5 min ago <a href="#">read article</a>
	</div>
</div>
</div>

<div class="row">
<?php //var_dump($cat->result())?>
<?php foreach($posts->result() as $post): ?>

<div class="col-md-3">
	<div class="d-block" style="width: 100%; margin-bottom: 5px">
		<img class="card-img-top" src="<?php echo site_url()."resources/images/logo.png"?>" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"><?php echo $post->title ?></h5>
			<div style="margin-bottom: 10px;">
				<span class="badge badge-primary"><?php echo $cat = $post->cat? $post->cat:"UNCATEGORIZED" ?></span>
			</div>
			<h6 class="card-subtitle mb-2 text-muted">posted by <?php echo $post->author ?></h6>
			<p class="card-text"><?php echo character_limiter($post->content,10)?></p>
			<a href="<?php echo site_url()."post/".bin2hex($post->post_id)?>" class="card-link">Read full article</a>
			<div class="card-footer bg-transparent text-center">
				<a class="card-link" class="like"><span class="fa fa-thumbs-up d-inline text-primary"></span><?php echo nbs(4).$this->post->getNumberOfComment($post->post_id)?></a>
				<a class="card-link" class="comment"><span class="fa fa-comment d-inline text-primary"></span><?php echo nbs(4).$this->post->getNumberOfComment($post->post_id)?></a>
				<a class="card-link" class="share"><span class="fa fa-share-alt text-primary"></span><?php echo nbs(4).$this->post->getNumberOfComment($post->post_id)?></a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

</div>
<?php
	//var_dump($cats);
	echo "<p>Post Category</p>";
	foreach($cats as $cat){
		
		if ( $cat->cat == NULL){
			echo anchor("#", "Uncategorised").br();
		}else{
			echo "<a href=''>".$cat->cat."</a>".br();
		}
		//var_dump($cat->cat);
		
	}
?>
<div style="margin-bottom: 100px;">
	
</div>