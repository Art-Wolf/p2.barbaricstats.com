<?php

class Lists extends CI_Controller {
	public function __construct() {
                parent::__construct();

                if (is_null($this->session->userdata('current_page'))) {
                        $this->session->set_userdata('previous_page', 'public_main');
                } else {
                        $this->session->set_userdata('previous_page', $this->session->userdata('current_page'));
                }

		$this->session->set_userdata('current_page', substr($_SERVER['REQUEST_URI'],1));
        }

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');


               	$this->load->database();
               	$this->load->model('users_db');

		$form_data = array();

		if ($this->session->userdata('user_id')) {
                        $form_data = array('follows.user_id' => $this->session->userdata('user_id'));
		} else {
			$form_data = array('follows.user_id' => -1);
		}

                $data['users'] = $this->users_db->get_list($form_data);

                $this->load->view('user_list', $data);

		$this->load->view('footer');
	}
}
?>
