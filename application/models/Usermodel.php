<?php


	class Usermodel extends CI_Model {
		
		public function __construct(){
			
			$this->load->database();
			
		}
		
		public function nou(){
			
			$this->db->select('*')
						->from('blog_users');
			return $this->db->count_all_results();
			
		}
		
		public function login($user_detail){
			
			$this->db->where('email', $user_detail['email']);
			$this->db->from('blog_users');
			return $this->db->get();
			
		}
		
		public function get_this_user_data($id){
			
			$this->db->where('user_id', $id);
			return $this->db->get('blog_users');
			
		}
		
		public function register($user_detail){
			
			$query = $this->db->insert_string('blog_users', $user_detail);
			return $this->db->query($query);
		}
		
		public function update($user_detail){
			$user_id = $user_detail['user_id'];
			unset($user_detail['user_id']);
			//var_dump($user_detail);
			//$this->db->where('user_id', $user_detail['user_id']);
			return $this->db->update('blog_users', $user_detail, "user_id = $user_id");
			
		}
		
	}


?>