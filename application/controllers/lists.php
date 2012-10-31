<?php

class Lists extends CI_Controller {

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		if ($this->session->userdata('user_name')) {
			$this->load->view('user_panel');
			$this->load->view('middle');

                	$this->load->database();
                	$this->load->model('users_db');

                	$data['users'] = $this->users_db->get_list();

                	$this->load->view('user_list', $data);
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
