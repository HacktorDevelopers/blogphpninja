<?php

	class Commentmodel extends CI_Model {
		
		public function __construct(){
			
			parent::__construct();
			$this->load->database();
			
		}
		
		public function regUserComment($comment_details){
			
			$query = $this->db->insert_string('comments', $comment_details);
			return $this->db->query($query);
			
		}
		
		public function delUserComment($comment_details){
			
			$query = $this->db->delete_string('comments', $comment_details);
			return $this->db->query($query);
			
		}
		
	}


?>