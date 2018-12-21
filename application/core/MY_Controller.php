<?php


	class MY_Controller extends CI_Controller {
		
		public function __construct()	{
			
			parent::__construct();

       		  //get your data
	   	      $global_data = array(
				'project_name'=>'PHP Ninja', 
				'year'=>date('Y'),
				'post_cats' => array('title', 'cat', 'author'),
				'login_credentials' => array('email', 'password'),
			);

		         //Send the data into the current view
		         //http://ellislab.com/codeigniter/user-guide/libraries/loader.html
			$this->load->vars($global_data);

			
		}
		
	}


?>