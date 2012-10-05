<?php

class Users extends CI_Controller {
               
	function index()
	{			

                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|xss_clean|valid_email|max_length[255]');			
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

		$this->load->view('header');
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register_form');
		}
		else
		{
			$this->load->database();
			$this->load->model('users_db');
			
			$form_data = array(
					       	'user_name' => set_value('user_name'),
					       	'email_address' => set_value('email_address'),
					       	'password' => set_value('password')
						);
					
			if ($this->users_db->Register($form_data) == TRUE) 
			{
				$this->load->view('register_success');
			}
			else
			{
				echo 'Database issue?';
			}
		} 

		$this->load->view('footer');
	}
}
?>
