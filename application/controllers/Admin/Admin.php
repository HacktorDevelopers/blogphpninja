<?php

	class Admin extends MY_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->library('form_validation');
			
		}
		
		public function index() {
			
			$this->load->view('admin/templates/header');
			$this->load->view('admin/index');
			$this->load->view('admin/templates/footer');
			
		}
		
		public function all($wtv){
			$this->load->view("admin/templates/header");
			$this->load->view("admin/".$wtv);
			$this->load->view('admin/templates/footer');
		}
		
	}


?>