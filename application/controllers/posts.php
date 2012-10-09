<?php

class Posts extends CI_Controller {

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		if ($this->session->userdata('user_name')) {
			$this->load->view('user_panel');
			$this->load->view('middle');

			$this->form_validation->set_rules('message', 'Message', 'required|xss_clean|max_length[140]');

			if ($this->form_validation->run() == FALSE) {
                        	$this->load->view('post_form');
			} else {
				$this->load->database();
				$this->load->model('posts_db');

				$form_data = array(
                                                        'user_name' => $this->session->userdata('user_name'),
                                                        'message' => set_value('message')
                                                        );

				if ($this->posts_db->Post($form_data) == TRUE) {
					$this->load->view('post_success');
				} else {
					$this->load->view('post_error');
				}
			}
		}
		else {
			$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');
                        $this->form_validation->set_rules('email_address', 'Email Address', 'required|xss_clean|valid_email|max_length[255]');
                        $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

                        $this->load->view('register_form');
                        $this->load->view('middle');

			$this->load->view('no_permission');
		}

		$this->load->view('footer');
	}
}
?>
