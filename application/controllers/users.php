<?php

class Users extends CI_Controller {
               
	function index()
	{			
		$this->load->library('session');
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		if ($this->session->userdata('user_name')) {
			$this->load->view('user_panel');
			$this->load->view('middle');
                        $this->load->view('user_main');
		}
		else {

			$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');			
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|xss_clean|valid_email|max_length[255]');			
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

			$this->load->view('header');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('register_form');
				$this->load->view('middle');
			}
			else
			{
				$this->load->view('user_panel');
				$this->load->view('middle');
				$this->load->database();
				$this->load->model('users_db');
			
				$form_data = array(
						       	'user_name' => set_value('user_name'),
						       	'email_address' => set_value('email_address'),
						       	'password' => set_value('password')
							);
					
				if ($this->users_db->Register($form_data) == TRUE) 
				{

					$this->session->set_userdata('user_name', $this->form_validation->user_name);

					$this->load->library('email');
	
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['smtp_host'] = 'smtp.gmail.com';
					$config['smtp_user'] = 'admin@barbaricstats.com';
					$config['smtp_pass'] = 'b0stonbrewin';
	
					$this->email->initialize($config);
					$this->email->from('admin@barbaricstats.com', 'Admin');
					$this->email->to($this->form_validation->email_address);

					$this->email->subject('Barbaric Stats - Registrtaion');
	
					$email_message = "Thank you for registering with barbaricstats.com.\n";
					$email_message .= "Please verify your account by clicking:\n";
					$email_message .= "\t\thttp://barbaricstats.com";

					$this->email->message($email_message);

					$this->email->send();
					$this->load->view('register_success');
				}
				else
				{
					echo 'Database issue?';
				}
			} 
		}

		$this->load->view('footer');
	}
}
?>
