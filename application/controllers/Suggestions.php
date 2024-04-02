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
					'title' => SITE_NAME . ' | Sugerencias',
					'styles' => array(base_url('public/css/snipps/dashboard.css')),
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
