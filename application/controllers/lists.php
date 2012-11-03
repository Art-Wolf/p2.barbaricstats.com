<?php

class Lists extends CI_Controller {

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');


               	$this->load->database();
               	$this->load->model('users_db');

		$form_data = array();

		if (defined($this->session->userdata('user_name'))) {
                        $form_data = array('follows.user_id' => $this->session->userdata('user_name'));
		} else {
			$form_data = array('follows.user_id' => -1);
		}

                $data['users'] = $this->users_db->get_list($form_data);

                $this->load->view('user_list', $data);

		$this->load->view('footer');
	}
}
?>
