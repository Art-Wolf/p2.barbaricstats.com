<?php

class Users extends CI_Controller {
	function logout()
	{
		$this->session->unset_userdata('user_name');

		$this->load->helper(array('form','url'));
                $this->load->library('form_validation');

		$this->load->view('header');
		$this->load->view('navigation_form');
		$this->load->view('middle');
		$this->load->view('logout');
		$this->load->view('footer');
	}

	function register() {
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');
                $this->form_validation->set_rules('email_address', 'Email Address', 'required|xss_clean|valid_email|max_length[255]');
                $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

                if ($this->form_validation->run() == FALSE) {
			$this->load->view('register_form');
			$this->load->view('middle');
                } else {
			$this->load->view('user_panel');
                        $this->load->view('middle');
                        $this->load->database();
                        $this->load->model('users_db');

                        $form_data = array(
                                                  'user_name' => set_value('user_name'),
                                                  'email_address' => set_value('email_address'),
                                                  'password' => set_value('password')
                                                   );

                        if ($this->users_db->Register($form_data) == TRUE) {
                        	$this->session->set_userdata('user_name', set_value('user_name'));

                                $this->load->library('email');

                                $this->email->from('admin@barbaricstats.com', 'Admin');
                                $this->email->to(set_value('email_address'));

                                $this->email->subject('Barbaric Stats - Registrtaion');

                                $email_message = "Thank you for registering with barbaricstats.com.\n";
                                $email_message .= "Please verify your account by clicking:\n";
                                $email_message .= "\t\thttp://barbaricstats.com";

                                $this->email->message($email_message);

                                $this->email->send();
                                $this->load->view('register_success');
                        } else {
				$this->load->view('post_error.php');
                        }
		}

                $this->load->database();
                $this->load->model('posts_db');

                $data['posts'] = $this->posts_db->get_posts();

                $this->load->view('public_main', $data);

		$this->load->view('footer');
	}
               
	function signin() {
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');
                $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('signin_form');
			$this->load->view('middle');
                } else {
                        $this->load->database();
                        $this->load->model('users_db');

                        $form_data = array(
                                                  'user_name' => set_value('user_name'),
                                                  'password' => set_value('password')
                                                   );

			if ($this->users_db->Signin($form_data) == TRUE) {
				$this->session->set_userdata('user_name', set_value('user_name'));
                        	$this->load->view('user_panel');
                        	$this->load->view('middle');
				$this->load->view('signin_success');
			} else {
                        	$this->load->view('signin_form');
                        	$this->load->view('middle');
				$this->load->view('signin_failure');
			}
		}

		$this->load->database();
                $this->load->model('posts_db');

                $data['posts'] = $this->posts_db->get_posts();

                $this->load->view('public_main', $data);
		$this->load->view('footer');
	}

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		if ($this->session->userdata('user_name')) {
			$this->load->view('user_panel');
			$this->load->view('middle');

			$this->load->database();
			$this->load->model('posts_db');

			$data['posts'] = $this->posts_db->get_posts();

                        $this->load->view('user_main', $data);
		}
		else {

			$this->load->view('navigation_form');
			$this->load->view('middle');

                        $this->load->database();
                        $this->load->model('posts_db');

                        $data['posts'] = $this->posts_db->get_posts();

                        $this->load->view('public_main', $data);
		}

		$this->load->view('footer');
	}
}
?>
