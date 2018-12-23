<?php

	class Post extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('postmodel', 'post');
			
		}
		
		public function allposts(){
			
			$data['posts'] = $this->post->getPosts();
			$data['title'] = " Blog post";
			$this->load->view('templates/header', $data);
			$this->load->view('posts/all', $data);
			$this->load->view('templates/footer.php', $data);
			
		}
		
		public function thispost($id){
			
			//NOC means NUMBER OF COMMENT
			//PCD means POST COMMENT DETAILS
			
			$data['thispost'] = $this->post->getPost($id);
			$data['page_header'] = $data['thispost']->row()->title;
			$data['title'] = $data['thispost']->row()->title;
			$data['NOC'] = $this->post->getNumberOfComment($data['thispost']->row()->post_id);
			$data['PCD'] = $this->post->getPostComments($data['thispost']->row()->post_id);
			
			$this->load->view('templates/header', $data);
			$this->load->view('posts/thispost', $data);
			$this->load->view('templates/footer.php', $data);
			
			//var_dump(;
			
		}
		
		
		public function searchLikePost(){
			//echo $_POST['searchWith'];
			$searchResult = $this->post->searchLikePost($this->input->post('keyword'), $this->input->post('searchWith'));
			
			if ( count($searchResult->result()) == 0):
				echo "Total match <span class='badge badge-danger'>".count($searchResult->result())."</span>";
				echo "<div class='alert alert-info'>";
					echo "No Post found with ".$this->input->post('searchWith')." <span class='text-danger'>".$this->input->post('keyword')."</span>";
				echo "</div>";
			else:
				echo "Total match <span class='badge badge-success'>".count($searchResult->result())."</span>";
				foreach($searchResult->result() as $res):
					//var_dump($res->title);
					echo "<div class='s bg-dark text-dark col'><a href='".site_url()."post/".$res->post_id."'>".highlight_phrase($res->title,$this->input->post('keyword'), '<span class="selected">', '</span>')."</a></div>";
				endforeach;
			endif;
			
		}
		
	}

?>