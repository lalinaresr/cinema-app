<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Users_model');
			$this->load->model('Roles_model');
			$this->load->model('Status_model');
		}

		/**
		* [index description]
		* @return [type] [description]
		*/
		public function index(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Usuarios',
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
						base_url('public/js/users.js')
					),
					'get_all_users' => $this->Users_model->get_all_users(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/users/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [add description]
		*/
		public function add(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Usuarios',
					'styles' => array(
						base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
						base_url('public/css/dashboard.css')
					),
					'scripts' => array(
						base_url('public/js/libs/moment.js'),
						base_url('public/js/libs/moment-with-locales.js'),
						base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
						base_url('public/js/users.js')
					),
					'get_all_status' => $this->Status_model->get_all_status(),
					'get_all_roles_activated' => $this->Roles_model->get_all_roles_activated(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/users/add');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [insert description]
		* @return [type] [description]
		*/
		public function insert(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$insert = array(
					'contact_firstname' => trim($this->input->post('user_firstname_insert')), 
					'contact_lastname' => trim($this->input->post('user_lastname_insert')), 
					'contact_sex' => trim($this->input->post('user_sex_insert')), 
					'contact_date_birthday' => trim($this->input->post('user_date_birthday_insert')), 
					'user_rol' => trim($this->input->post('user_rol_insert')), 
					'user_status' => trim($this->input->post('user_status_insert')), 
					'user_username' => trim($this->input->post('user_username_insert')), 
					'user_email' => trim($this->input->post('user_email_insert')), 
					'user_password' => generate_password(trim($this->input->post('user_date_birthday_insert')), trim($this->input->post('user_firstname_insert')), trim($this->input->post('user_lastname_insert'))) 
				);
				$this->Users_model->insert_model($insert);
			}			
		}

		/**
		* [view description]
		* @return [type] [description]
		*/
		public function view($id_user){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Usuarios',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/users.js')),
					'id_user_encryp' => $id_user,
					'view_user' => $this->Users_model->get_user_by('id_user', $id_user),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/users/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [edit description]
		* @param  [type] $id_user [description]
		* @return [type]          [description]
		*/
		public function edit($id_user){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Usuarios',
					'styles' => array(
						base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
						base_url('public/css/dashboard.css')
					),
					'scripts' => array(
						base_url('public/js/libs/moment.js'),
						base_url('public/js/libs/moment-with-locales.js'),
						base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
						base_url('public/js/users.js')
					),
					'id_user_encryp' => $id_user,
					'edit_user' => $this->Users_model->get_user_by('id_user', $id_user),
					'get_all_status' => $this->Status_model->get_all_status(),
					'get_all_roles_activated' => $this->Roles_model->get_all_roles_activated(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/users/edit');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [update description]
		* @return [type] [description]
		*/
		public function update(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$update = array(
					'id_user' => trim($this->input->post('id_user_update')), 
					'user_contact' => trim($this->input->post('id_contact_update')), 
					'user_firstname' => trim($this->input->post('user_firstname_update')), 
					'user_lastname' => trim($this->input->post('user_lastname_update')), 
					'user_sex' => trim($this->input->post('user_sex_update')), 
					'user_date_birthday' => trim($this->input->post('user_date_birthday_update')), 
					'user_rol' => trim($this->input->post('user_rol_update')), 
					'user_status' => trim($this->input->post('user_status_update')), 
					'user_username' => trim($this->input->post('user_username_update')), 
					'user_email' => trim($this->input->post('user_email_update')), 
					'user_password' => generate_password(trim($this->input->post('user_date_birthday_update')), trim($this->input->post('user_firstname_update')), trim($this->input->post('user_lastname_update'))) 
				);
				$this->Users_model->update_model($update);
			}			
		}

		/**
		* [edit_avatar description]
		* @param  [type] $id_user [description]
		* @return [type]          [description]
		*/
		public function edit_avatar($id_user){
			if (!$this->session->userdata('is_admin_logged_in') &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Usuarios',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/users.js')),
					'id_user_encryp' => $id_user,
					'view_user' => $this->Users_model->get_user_by('id_user', $id_user),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/users/avatar');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}
		}

		/**
		* [update_avatar description]
		* @return [type] [description]
		*/
		public function update_avatar(){
			if (!$this->session->userdata('is_admin_logged_in')  &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$config['upload_path'] = FOLDER_AVATARS;
	        	$config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = 2048;

	            $this->load->library('upload', $config);

	            if ( $this->upload->do_upload('user_avatar_customize')){ 
	            	$update = array(
	            		'id_user' => $this->input->post('id_user_customize_avatar'), 	            		
	            		'user_avatar' => $this->upload->data()['file_name'],
	            		'old_image_ext' => substr(trim($this->input->post('image_avatar_update_route')), -4)
	            	);
	            	$this->Users_model->update_avatar($update);
	            } else { 
	            	echo "ErrorUP"; 
	            }				
			}		
		}

		/**
		* [delete description]
		* @return [type] [description]
		*/
		public function delete(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$id_user = $this->input->post('id_user_delete');

				$this->Users_model->delete_model($id_user);
			}			
		}
	}
?>
