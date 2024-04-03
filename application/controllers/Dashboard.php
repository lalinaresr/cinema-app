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
					'title' => constant('APP_NAME'),
					'styles' => array(base_url('public/css/dashboard.css')),
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
