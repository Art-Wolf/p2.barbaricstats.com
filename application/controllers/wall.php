<?php

class Wall extends CI_Controller {
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
               	$this->load->model('posts_db');

          	$data['posts'] = $this->posts_db->get_posts();

		$this->load->model('karma_db');
		$data['karma'] = $this->karma_db->weekly_stats();

		$this->load->view('side_stats', $data);
              	$this->load->view('public_main', $data);

		$this->load->view('footer');
	}
}
?>
