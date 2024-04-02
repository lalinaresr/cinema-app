<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Dashboard extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Users_model');
			$this->load->model('Suggestions_model');
			$this->load->model('Newsletters_model');
			$this->load->model('Sessions_model');
		}

		/**
		* [index description]
		* @return [type] [description]
		*/
		public function index(){
			if (!$this->session->userdata('is_admin_logged_in') &&				
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'page_title' => SITE_NAME,
					'css_files' => array(
						base_url() . 'assets/css/bootstrap.min.css',
						base_url() . 'assets/css/font-awesome.min.css',
						'https://fonts.googleapis.com/css?family=Ubuntu',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css', 
						base_url() . 'assets/css/snipps/dashboard.css',
						base_url() . 'assets/css/styles.css'
					),
					'js_files' => array(
						base_url() . 'assets/js/jquery-3.2.1.js',
						base_url() . 'assets/js/jquery.form.min.js',
						base_url() . 'assets/js/bootstrap.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					),
					'get_some_suggestions' => $this->Suggestions_model->get_some_suggestions(),
					'get_some_newsletters' => $this->Newsletters_model->get_some_newsletters(),
					'get_some_sessions' => $this->Sessions_model->get_some_sessions($this->session->userdata('id_user')), 
					'get_my_sessions' => $this->Sessions_model->get_my_sessions($this->session->userdata('id_user')),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/dashboard/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}
	}
?>
