<?php

	class Postmodel extends CI_Model {
		
		public  function __construct(){
			
			$this->load->database();
			
		}
		
		public function getPost($post_id){
			
			return $this->db->get_where('blog', array('post_id'=>$post_id));
			
		}
		
		public function getPosts(){
			
			return $this->db->get('blog');
			
		}
		
		public function getNumberOfComment($post_id){
			
			$this->db->where('post_id', $post_id);
			$this->db->from('comments');
			return $this->db->count_all_results();
			
		}
		
		public function getPostComments($post_id){
			
			return $this->db->get_where('comments', array('post_id' => $post_id));
			
		}
		
	}


?>