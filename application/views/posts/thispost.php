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

<div class="list-group">
<?php

		$sec = 60;
		$min = $sec * $sec;
		//echo br();
		$hour = $min * $min;
		//echo br();
		$day = 24 * $hour;
		//echo br();
		$user = "";
		$class =  "";
			if ( isset($this->session->user_data) ):
				$user = $this->session->user_data->email;
				$class = 'success';
			else:
				$user = "Guest";
				$class = 'danger';
			endif;
			echo "<div class='alert alert-".$class."'>";
				echo "You are logged in as ".$user.br();
			echo "</div>";

		if ($NOC > 0){
			echo "Comments: ".$NOC.br();
			
		}else{
			echo "No Comment: ";
		}
		foreach ( $PCD->result() as $comment):
		
		//		POST TIMESTAMP DATE MONTH YEAR HOUR MINUTE SECOND
		$timestamp = explode(' ', $comment->created_at);
		$date = explode('-', $timestamp[0]);
		
		//		TODAY DAY, MONTH, YEAR
		$todayday = date('d');
		$todaymonth = date('m');
		$todayyear = date('Y');
		$todayhour = date('H');
		$todayminute = date('i');
		$todaysecond = date('s');
		
		
		//var_dump($date);
		$cday = $todayday-$date[2];
		/*$cday = $cday/$hour." hours";
		if ($cday < 0){
			$cday = 24 - $cday;
			$cday .= " hours";
		}elseif($cday == 1){
			$cday .= " day ";
		}else{
			$cday .= " days";
		}*/
?>
<div class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $comment->commenter; ?></h5>
      <small><?php echo $cday?> ago</small>
    </div>
    <p class="mb-1"><?php echo nbs(5).$comment->comment?></p>
    <small></small>
  </div>
			
			
			
<?php	endforeach; ?>
</div>
</div>

<?php if ( isset($this->session->user_data) ):?>
	<div class="form-group">
		<label for="comment">Leave a comment</label>
		<input type="hidden" name="post_id" value="<?php echo $post->post_id?>"/>
		<textarea class="form-control" name="commentbox" id="commentbox" placeholder="Comment" rows="3"></textarea><br/>
		<button class="btn btn-info" id="commentbtn">Comment</button>
	</div>
<?php else: ?>
	<div class="alert alert-info">
		<p>You Must Be Logged In To Comment...</p>
	</div>
<?php endif?>
</div>
<div style="margin-top: 70px">
</div>