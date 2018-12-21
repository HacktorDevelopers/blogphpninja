<?php

	class Comment extends CI_Controller {
		
		public function __construct(){
		
			//$this->load->model('commentmodel', 'comment');
			
		}
		
		public function regUserComment(){
			echo $_POST['comment_value'];
			if ( ! isset($this->session->user_online)):
				echo "You must be logged in before you comment";
			else:
				$comment_detail = array(
					'comment' => $this->input->post('comment_value'),
					'commenter' => $this->session->username
				);
			endif;
			
		}
		
	}


?>