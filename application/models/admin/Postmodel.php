<?php

	class Postmodel extends CI_Model {
		
		public function __construct(){
			
			$this->load->database();
			
		}
		
		public function addpost($postdetails){
			
			$sql = $this->db->insert_string('blog', $postdetails);
			return $this->db->query($sql);
			
		}
		
		public function updatepost($postdetails){
			
			$post_id = $postdetails['post_id'];
			$sql = $this->db->update('blog', $postdetails, "post_id=$post_id");
			return $sql;
			
		}
		
	}


?>