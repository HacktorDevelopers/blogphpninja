<?php


	class Usermodel extends CI_Model {
		
		public function __construct(){
			
			$this->load->database();
			
		}
		
		public function login($user_detail){
			
			$this->db->where('email', $user_detail['email']);
			$this->db->from('blog_users');
			return $this->db->get();
			
		}
		
		public function register($user_detail){
			
			$query = $this->db->insert_string('blog_users', $user_detail);
			return $this->db->query($query);
		}
		
	}


?>