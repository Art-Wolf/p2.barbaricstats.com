<?php

class Posts extends CI_Controller {
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

		if ($this->session->userdata('user_name')) {

			$this->form_validation->set_rules('message', 'Message', 'required|xss_clean|max_length[140]');

			if ($this->form_validation->run() == FALSE) {
                        	$this->load->view('post_form');
			} else {
				$this->load->database();
				$this->load->model('users_db');

				$form_data = array( 'user_name' => $this->session->userdata('user_name') );

				$row = $this->users_db->Get_id($form_data);

				$this->load->model('posts_db');

				$form_data = array(
                                                        'user_id' => $row->id,
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

			$this->load->view('no_permission');
		}

		$this->load->view('footer');
	}

	function history()
        {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {

                	$this->load->view('post_form');

				
                        $this->load->database();
                        $this->load->model('posts_db');

                        $form_data = array(
                        	'users.id' => $this->session->userdata('user_id')
                        );

                        $data['posts'] = $this->posts_db->Get_user_posts($form_data);

                        $this->load->view('user_posts', $data);
                }
                else {
                        $this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');
                        $this->form_validation->set_rules('email_address', 'Email Address', 'required|xss_clean|valid_email|max_length[255]');
                        $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

                        $this->load->view('no_permission');
                }

                $this->load->view('footer');
        }

	function edit($post_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {

                        $this->form_validation->set_rules('message', 'Message', 'required|xss_clean|max_length[140]');

			$this->load->database();
                        $this->load->model('posts_db');

                        if ($this->form_validation->run() == FALSE) {
				$form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

				if ($this->posts_db->Post_owner($form_data)) {
					$form_data = array( 'posts.id' => $post_id );
					$data['post'] = $this->posts_db->Get_post($form_data);

					$this->load->view('post_edit', $data);
				} else {
					$this->load->view('no_permission');
				}
                        } else {
				$form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

                                if ($this->posts_db->Post_owner($form_data)) {

					$post_data = array('id' => $post_id);

                                	$form_data = array(
                                                        'message' => set_value('message')
                                                        );

                                	if ($this->posts_db->Edit_post($post_data, $form_data) == TRUE) {
                                	        $this->load->view('post_edit_success');
                                	} else {
                                	        $this->load->view('post_edit_error');
                                	}
				} else {
					$this->load->view('post_edit_error');
				}
                        }
                }
                else {
                        $this->load->view('no_permission');
                }

                $this->load->view('footer');
	}

	function delete($post_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {
			$this->form_validation->set_rules('message', 'Message', 'required');

                        $this->load->database();
                        $this->load->model('posts_db');

                        if ($this->form_validation->run() == FALSE) {
                                $form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

                                if ($this->posts_db->Post_owner($form_data)) {
                                        $form_data = array( 'posts.id' => $post_id );
                                        $data['post'] = $this->posts_db->Get_post($form_data);

                                        $this->load->view('post_delete', $data);
                                } else {
                                        $this->load->view('no_permission');
                                }
                        } else {
                                $form_data = array( 'posts.user_id' => $this->session->userdata('user_id'), 'posts.id' => $post_id );

                                if ($this->posts_db->Post_owner($form_data)) {

                                        $form_data = array('id' => $post_id);

                                        if ($this->posts_db->Delete_post($form_data) == TRUE) {
                                                $this->load->view('post_delete_success');
                                        } else {
                                                $this->load->view('post_delete_error');
                                        }
                                } else {
                                        $this->load->view('post_delete_error');
                                }
                        }
                }
                else {
                        $this->load->view('no_permission');
                }

                $this->load->view('footer');
        }
}
?>
