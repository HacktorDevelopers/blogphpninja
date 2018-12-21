<?php


	class Users extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function index(){
			
			$this->load->view('templates/header');
			$this->load->view('users/dashboard');
			$this->load->view('templates/footer');
			
		}
		
		public function login(){
			if ( count($_POST) == 0):
				$this->load->view('templates/header');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			else:
				echo "Post request sent";
			endif;
			
		}
		
		public function register(){
			if ( count($_POST) == 0):
				$this->load->view('templates/header');
				$this->load->view('users/register');
				$this->load->view('templates/footer');
			else:
				var_dump($_POST);
			endif;
			
		}
		
		public function forgot_password(){
			if ( count($_POST) == 0):
				$this->load->view('templates/header');
				$this->load->view('users/dashboard');
				$this->load->view('templates/footer');
			else:
				echo "Post request sent";
			endif;
			
		}
		
		public function reset_password(){
			if ( count($_POST) == 0):
				$this->load->view('templates/header');
				$this->load->view('users/reset_password');
				$this->load->view('templates/footer');
			else:
				echo "Post request sent";
			endif;
			
		}
		
	}


?>