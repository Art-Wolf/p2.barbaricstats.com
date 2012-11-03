<?php

class Karma extends CI_Controller {

	function index()
	{			
	}

	function up($post_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

		if ($this->session->userdata('user_name')) {

                        $this->load->database();
                        $this->load->model('posts_db');

                        $form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

                        if ($this->posts_db->Post_owner($form_data) == FALSE) {
				$this->load->model('karma_db');
                                $form_data = array( 
					'karma.user_id'  => $this->session->userdata('user_id'), 
					'karma.post_id' => $post_id);

                                if($this->karma_db->Up_karma($form_data) == TRUE) {
                			$data['posts'] = $this->posts_db->get_posts();
                                	$this->load->view('user_main', $data);
				} else {
					$this->load->view('karma_error');
				}
                        } else {
                        	$this->load->view('karma_no_permission');
			} 
		} else {
                	$this->load->view('no_permission');
                }
	}

	function down($post_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {

                        $this->load->database();
                        $this->load->model('posts_db');

                        $form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

                        if ($this->posts_db->Post_owner($form_data) == FALSE) {
                                $this->load->model('karma_db');
                                $form_data = array(
                                        'karma.user_id'  => $this->session->userdata('user_id'),
                                        'karma.post_id' => $post_id);

                                if($this->karma_db->Down_karma($form_data) == TRUE) {

                                	$data['posts'] = $this->posts_db->get_posts();
                                	$this->load->view('user_main', $data);
				} else {
					$this->load->view('karma_error');
				}
                        } else {
                                $this->load->view('karma_no_permission');
                        }
                } else {
                        $this->load->view('no_permission');
                }
        }

}
?>
