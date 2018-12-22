<?php


	class Users extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('usermodel', 'user');
		}
			
		public function index(){
			
			$this->load->view('templates/header');
			$this->load->view('users/dashboard');
			$this->load->view('templates/footer');
			
		}
	
		public function login(){
			$this->load->view('templates/header');
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		}
		
		public function loginuser(){
			//var_dump($this->input->post('password'));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			
			if ( $this->form_validation->run() == FALSE){
				echo validation_errors();
				//var_dump($this->form_validation->run());
			}else{
				$user_detail = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);
				//var_dump($user_detail);
				$db_user_detail = $this->user->login($user_detail)->row();
				if ( ! $db_user_detail ):
					echo "No User With ".$user_detail['email']." please check the email";
				else:	
					//var_dump($db_user_detail);
					if ($user_detail['password'] == $db_user_detail->password):
						//echo "Password correct";
						$this->session->set_userdata('user_data', $db_user_detail);
						//$this->session->set_userdata('user_online', true);
						//var_dump($this->session->userdata);
						$rto = site_url();
						redirect($rto.'users/index');
					else:
						echo "Password not correct";
					endif;
				endif;
			}
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
		
		public function logout(){

			$this->session->unset_userdata('user_data');
			$rto = site_url();
			redirect($rto);
			
		}
		
	}


?>