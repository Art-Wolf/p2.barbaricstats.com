<?php

class Wall extends CI_Controller {

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

               	$this->load->database();
               	$this->load->model('posts_db');

          	$data['posts'] = $this->posts_db->get_posts();

              	$this->load->view('public_main', $data);

		$this->load->view('footer');
	}
}
?>
