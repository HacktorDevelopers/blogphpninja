<?php $post = $thispost->row()?>


<div class="card text-white bg-light mb-3 text-dark" style="max-width: 100%;">
  <div class="card-header"><?php echo $post->title?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $post->cat?></h5>
    <p class="card-text"><?php echo $post->content?></p>
</div>
</div>
</div>
<div class="container">
<div id="comments">
<?php
		if ($NOC > 0){
			echo "Comments: ".$NOC.br();
		}else{
			echo "No Comment: ";
		}
		foreach ( $PCD->result() as $comment):
			
			echo $comment->commenter.br();
			echo nbs(5).$comment->comment.br();
		endforeach;
?>
</div>


	<div class="form-group">
		<label for="comment">Leave a comment</label>
		<textarea class="form-control" name="commentbox" id="commentbox" placeholder="Comment" rows="3"></textarea><br/>
		<button class="btn btn-info" id="commentbtn">Comment</button>
	</div>
</div>