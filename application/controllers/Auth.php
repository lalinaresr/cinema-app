<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Auth_model');
		}
		
		/**
		* [index description]
		* @return [type] [description]
		*/
		public function index(){
			if ($this->session->userdata('is_admin_logged_in') ||
				$this->session->userdata('is_user_logged_in') ||
				$this->session->userdata('is_guest_logged_in')) {
				redirect('dashboard/');
			} else {
				redirect(site_url('auth/login/'));				
			}			
		}

		/**
		* [login description]
		* @return [type] [description]
		*/
		public function login(){
			if ($this->session->userdata('is_admin_logged_in') ||
				$this->session->userdata('is_user_logged_in') ||
				$this->session->userdata('is_guest_logged_in')) {
				redirect('dashboard/');
			} else {
				$params = array(
					'page_title' => SITE_NAME . ' - Iniciar sesión',
					'css_files' => array(
						base_url() . 'assets/css/bootstrap.min.css',
						base_url() . 'assets/css/font-awesome.min.css',
						'https://fonts.googleapis.com/css?family=Ubuntu',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css', 
						base_url() . 'assets/css/snipps/login.css', 
						base_url() . 'assets/css/styles.css'
					),
					'js_files' => array(
						base_url() . 'assets/js/jquery-3.2.1.js',
						base_url() . 'assets/js/jquery.form.min.js',
						base_url() . 'assets/js/bootstrap.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					) 
				);
				$this->load->view('header', $params);								
				$this->load->view('partials/login/container');
				$this->load->view('footer');
			}			
		}

		/**
		* [check_login description]
		* @return [type] [description]
		*/
		public function check_login(){
			if ($this->session->userdata('is_admin_logged_in') ||
				$this->session->userdata('is_user_logged_in') ||
				$this->session->userdata('is_guest_logged_in')) {
				redirect('dashboard/');
			} else {
				$login = array(
					'email' => trim($this->input->post('email_login')), 
					'password' => trim($this->input->post('password_login'))
				);
				$this->Auth_model->login_model($login);
			}
		}

		/**
		* [logout description]
		* @return [type] [description]
		*/
		public function logout(){ $this->session->sess_destroy(); echo site_url(); }
	}
?>
