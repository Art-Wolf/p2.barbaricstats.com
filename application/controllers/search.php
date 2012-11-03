<?php

class Search extends CI_Controller {

	public function __construct() {
                parent::__construct();

                if (is_null($this->session->userdata('current_page'))) {
                        $this->session->set_userdata('previous_page', 'public_main');
                } else {
                        $this->session->set_userdata('previous_page', $this->session->userdata('current_page'));
                }

		$this->session->set_userdata('current_page', substr($_SERVER['REQUEST_URI'],1));
        }

	function tag($term) {			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

               	$this->load->database();
               	$this->load->model('posts_db');

		$form_data = array('term' => $term);

                $data['posts'] = $this->posts_db->search($form_data);

                $this->load->view('public_main', $data);

		$this->load->view('footer');
	}

	function index() {
		$this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                $this->form_validation->set_rules('search', 'Search Term', 'required|xss_clean|max_length[140]');

                if ($this->form_validation->run() == FALSE) {
                                redirect('/');
                } else {
                	$this->load->database();
                        $this->load->model('posts_db');

                        $form_data = array(
                        	'term' => set_value('search')
                        );

                        $data['posts'] = $this->posts_db->search($form_data);

			if (count($data['posts']) > 0) {
                		$this->load->view('public_main', $data);
			} else {
				$this->load->view('search_empty');
			}
                	$this->load->view('footer');
                }
	}
}
?>
