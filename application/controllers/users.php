<?php

class Users extends CI_Controller {
	public function __construct() {
                parent::__construct();

                if (is_null($this->session->userdata('current_page'))) {
                        $this->session->set_userdata('previous_page', 'public_main');
                } else {
                        $this->session->set_userdata('previous_page', $this->session->userdata('current_page'));
                }

		$this->session->set_userdata('current_page', substr($_SERVER['REQUEST_URI'],1));
        }

	function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_id');

		$this->load->view('header');
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
		$this->form_validation->set_rules('location', 'Location', 'xss_clean|max_length[255]');
                $this->form_validation->set_rules('website', 'Home Page', 'xss_clean|max_length[255]');
                $this->form_validation->set_rules('bio', 'Bio', 'xss_clean|max_length[255]');

                if ($this->form_validation->run() == FALSE) {
			$this->load->view('register_form');
                } else {
			$config['upload_path'] = './img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
	
			$this->load->library('upload', $config);

			$this->upload->do_upload("photo");
	                $this->load->database();
	                $this->load->model('users_db');

			$uploaded_info = $this->upload->data();

	                $form_data = array(
                              	'user_name' => set_value('user_name'),
                              	'email_address' => set_value('email_address'),
                              	'password' => set_value('password'),
				'location' => set_value('location'),
				'website' => set_value('website'),
                                'bio' => set_value('bio'),
                                'photo' => $uploaded_info['file_name']
                        );

        	        if ($this->users_db->Register($form_data) == TRUE) {
        	             	$this->session->set_userdata('user_name', set_value('user_name'));
				$form_data = array( 'user_name' => $this->session->userdata('user_name') );
        	                $row = $this->users_db->Get_id($form_data);

        	                $this->session->set_userdata('user_id', $row->id);

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

		$this->load->view('footer');
	}
               
	function signin() {
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[30]');
                $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]|md5');

                $this->load->database();
                $this->load->model('posts_db');

		if ($this->form_validation->run() == TRUE) {
                        $this->load->model('users_db');

                        $form_data = array(
                                                  'user_name' => set_value('user_name'),
                                                  'password' => set_value('password')
                                                   );

			if ($this->users_db->Signin($form_data) == TRUE) {
				$this->session->set_userdata('user_name', set_value('user_name'));

				$form_data = array( 'user_name' => set_value('user_name') );
                        	$row = $this->users_db->Get_id($form_data);
				$this->session->set_userdata('user_id', $row->id);

				$form_data = array(
					'user_id' => $row->id);
			
				$this->users_db->Log_login($form_data);
				redirect('/');	
			} else {
				$this->load->view('header');
				$this->load->view('signin_failure');

				$this->load->view('signin_form');
			}
		} else {
			$this->load->view('header');
			$this->load->view('signin_form');
		}

		$this->load->view('footer');
	}

	function index()
	{			
                $this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->load->view('header');

		$this->load->database();
                $this->load->model('posts_db');

		if ($this->session->userdata('user_name')) {
			$form_data = array ( 'follows.user_id' => $this->session->userdata('user_id'));
                        $data['posts'] = $this->posts_db->get_followed_posts($form_data);

			$this->load->model('karma_db');
                	$data['karma'] = $this->karma_db->weekly_stats();
			$this->load->view('side_stats', $data);
                        $this->load->view('user_main', $data);
		}
		else {
			$data['posts'] = $this->posts_db->get_posts();
			$this->load->model('karma_db');
                	$data['karma'] = $this->karma_db->weekly_stats();
			$this->load->view('side_stats', $data);
                        $this->load->view('public_main', $data);
		}

		$this->load->view('footer');
	}

	function display($user_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                $this->load->database();
                $this->load->model('posts_db');

		$form_data = array('users.id' => $user_id);

                $data['posts'] = $this->posts_db->get_user_posts($form_data);

                $this->load->model('users_db');

                $form_data = array('follows.user_id' => $user_id);
                $data['follows'] = $this->users_db->get_following_list($form_data);

		$form_data = array('users.id' => $user_id);
		$data['profile'] = $this->users_db->get_profile($form_data);

                $this->load->view('user_follows', $data);
		$this->load->view('user_profile', $data);
		$this->load->view('user_posts', $data);
                $this->load->view('footer');
	}

	function unfollow($user_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {
                        $this->load->database();

                        $this->load->model('users_db');

                        $form_data = array( 'user_name' => $this->session->userdata('user_name') );
                        $row = $this->users_db->Get_id($form_data);

                        $form_data = array('user_id' => $row->id, 'followed_id' => $user_id);

                        $this->users_db->stop_following($form_data);

                        $form_data = array('follows.user_id' => $row->id);

                        $data['follows'] = $this->users_db->get_following_list($form_data);

                        $this->load->view('user_follows', $data);
                }

                $this->load->view('footer');
        }

	function follow($user_id) {
                $this->load->helper(array('form','url'));
                $this->load->library('form_validation');

                $this->load->view('header');

                if ($this->session->userdata('user_name')) {
        	        $this->load->database();
                	 
			$this->load->model('users_db');

                	$form_data = array('user_id' => $this->session->userdata('user_id'), 'followed_id' => $user_id);

			$this->users_db->start_following($form_data);

			redirect(site_url($this->session->userdata('previous_page')));
		}

                $this->load->view('footer');
	}

}
?>
