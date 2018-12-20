<?php

	$post = $thispost->row();
		echo $post->title.br();
		echo $post->content.br();
		echo "posted by: ".$post->author.br();
		echo "Comments: ".$NOC.br();
		foreach ( $PCD->result() as $comment):
			echo $comment->commenter.br();
			echo nbs(5).$comment->comment.br();
		endforeach;
?>