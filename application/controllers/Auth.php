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
					'title' => constant('APP_NAME') . ' - Iniciar sesión',
					'styles' => array(base_url('public/css/auth.css'))
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
					'email' => trim($this->input->post('email')), 
					'password' => trim($this->input->post('password'))
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
