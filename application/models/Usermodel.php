<?php


	class Usermodel extends CI_Model {
		
		public function __construct(){
			
			$this->load->database();
			
		}
		
		public function login($user_detail){
			
			
			
		}
		
		public function register($user_detail){
			
			$query = $this->db->insert_string('blog_users', $user_detail);
			
		}
		
	}


?>