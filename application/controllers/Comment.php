<?php

	class Comment extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('commentmodel', 'comment');
			
		}
		
		public function regUserComment(){
			
			if ( ! isset($this->session->user_online) ):
				echo "You must be logged in before you comment";
			else:
				$comment_detail = array(
					'post_id' => $_POST['postid'],
					'comment' => $_POST['comment_value'],
					'commenter' => 'Toykam'
				);
				
				if ($this->comment->regUserComment($comment_detail) ):
					echo "Comment saved for moderation";
				endif;
			endif;
			
		}
		
	}


?>