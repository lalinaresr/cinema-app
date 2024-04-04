<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Newsletters extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Newsletter_model');
			$this->load->model('User_model');
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
					'title' => constant('APP_NAME') . ' | Seguidores',
					'styles' => array(
						base_url('public/css/libs/dataTables.bootstrap.min.css'),
						base_url('public/css/libs/buttons.bootstrap.min.css'),
						base_url('public/css/dashboard.css')
					),
					'scripts' => array(
						base_url('public/js/libs/jszip.min.js'),
						base_url('public/js/libs/pdfmake.min.js'),
						base_url('public/js/libs/vfs_fonts.js'),
						base_url('public/js/libs/dataTables.min.js'),
						base_url('public/js/libs/dataTables.bootstrap.min.js'),
						base_url('public/js/libs/dataTables.buttons.min.js'),
						base_url('public/js/libs/buttons.bootstrap.min.js'),
						base_url('public/js/libs/buttons.html5.min.js'),						
						base_url('public/js/newsletters.js')
					),
					'get_all_newsletters' => $this->Newsletter_model->get_all_newsletters(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/newsletters/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}
	}
?>
