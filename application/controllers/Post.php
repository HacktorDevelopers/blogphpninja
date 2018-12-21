<?php

	class Post extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('postmodel', 'post');
			
		}
		
		public function allposts(){
			
			$data['posts'] = $this->post->getPosts();
			
			$this->load->view('templates/header', $data);
			$this->load->view('posts/all', $data);
			$this->load->view('templates/footer.php', $data);
			
		}
		
		public function thispost($id){
			
			//NOC means NUMBER OF COMMENT
			//PCD means POST COMMENT DETAILS
			
			$data['thispost'] = $this->post->getPost($id);
			$data['page_header'] = $data['thispost']->row()->title;
			$data['NOC'] = $this->post->getNumberOfComment($data['thispost']->row()->post_id);
			$data['PCD'] = $this->post->getPostComments($data['thispost']->row()->post_id);
			
			$this->load->view('templates/header', $data);
			$this->load->view('posts/thispost', $data);
			$this->load->view('templates/footer.php', $data);
			
			//var_dump(;
			
		}
		
		
		public function searchLikePost(){
			
			$searchResult = $this->post->searchLikePost($this->input->post('keyword'))->result();
			foreach($searchResult as $res):
				//var_dump($res->title);
				echo "<li><a href='".site_url()."post/".$res->post_id."'>".$res->title."</a></li>";
			
			endforeach;
			
		}
		
	}

?>