<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Home Page";
		$data['page_header'] = "Home Page";
		
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer', $data);
		
		redirect('post/all');
	}
	
	public function load_page($page){
		
		$data['title'] = "Blog9ja ".$page;
		$data['page_header'] = $page;
		
		$this->load->view('templates/header', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer', $data);
	}
}
