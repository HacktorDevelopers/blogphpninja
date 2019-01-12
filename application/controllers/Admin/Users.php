<?php


	class Users extends MY_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('usermodel', 'user');
		}
			
		public function index(){
			if ( isset($this->session->user_data)):
				$this->session->user_data = $this->user->get_this_user_data($this->session->user_data->user_id)->row();
				$this->load->view('templates/header');
				$this->load->view('users/dashboard');
				$this->load->view('templates/footer');
			else:
				redirect('users/login');
			endif;
			
		}
	
		public function login(){
			if ( ! isset($this->session->user_data) ):
				$this->load->view('templates/header');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			else:
				redirect('users');
			endif;
		}
		
		public function loginuser(){
			if ( isset($this->session->user_data) ):
				echo "Please Logout Before Logging In";
			else:
			
			//var_dump($this->input->post('password'));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			
			if ( $this->form_validation->run() == FALSE){
				echo validation_errors();
				//var_dump($this->form_validation->run());
			}else{
				$user_detail = array(
					'email' => $this->input->post('email'),
					'password' => bin2hex( $this->input->post('password'))
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
			endif;
		}
		
		public function register(){
			if ( count($_POST) == 0):
				$this->load->view('templates/header');
				$this->load->view('users/register');
				$this->load->view('templates/footer');
			else:
				//var_dump($_POST);
				//$this->user->register($)
				$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha');
				$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|alpha');
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[blog_users.email]');
				$this->form_validation->set_rules('gender', 'Gender', 'required|alpha');
				$this->form_validation->set_rules('password', 'Password', 'required|max_length[16]|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
				$this->form_validation->set_rules('user_id', '', 'required|exact_length[10]');
				if( $this->form_validation->run() == FALSE):
					echo validation_errors();
				else:
					unset($_POST['confirm_password']);
					$_POST['password'] = bin2hex($_POST['password']);
					//$_POST['user_id'] = random_string('numeric', 10);
					//var_dump($_POST);
					if ( $this->user->register($_POST) ):
						echo "Registration Successful. You can now login";
						$data['url'] = site_url()."users/login";
					else:
						echo "Unable to register user";
					endif;
				endif;
			endif;
			
		}
		
		public function update_profile(){
			if ( ! isset($this->session->user_data ) ):
				redirect(site_url());
			else:
				if ( ! count($_POST) ):
					$user_id = $this->session->user_data->user_id;
					$data['userdata'] = $this->user->get_this_user_data($user_id)->row();
					
					$this->load->view('templates/header', $data);
					$this->load->view('users/edit', $data);
					$this->load->view('templates/footer', $data);
					
				else:
					//var_dump($_POST);
					unset($_POST['update']);
					if ($this->user->update($_POST) ):
						$this->session->set_flashdata('msg', 'Update Successfull');
						$this->session->set_flashdata('flag', 'success');
						redirect(site_url().'users');
					endif;
				endif;
			endif;
		}
		
		public function user_notification(){
			
			
			
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