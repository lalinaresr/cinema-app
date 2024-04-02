<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Suggestions extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Users_model');
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
					'page_title' => SITE_NAME . ' | Sugerencias',
					'css_files' => array(
						base_url() . 'public/css/bootstrap.min.css',
						base_url() . 'public/css/font-awesome.min.css',
						'https://fonts.googleapis.com/css?family=Ubuntu',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css', 
						base_url() . 'public/css/snipps/dashboard.css',
						base_url() . 'public/css/styles.css'
					),
					'js_files' => array(
						base_url() . 'public/js/jquery-3.2.1.js',
						base_url() . 'public/js/jquery.form.min.js',
						base_url() . 'public/js/bootstrap.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js',
						base_url() . 'public/js/snipps/auth.js',
						base_url() . 'public/js/site.js'
					),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/suggestions/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}
	}
?>
