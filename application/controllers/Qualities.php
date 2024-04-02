<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Qualities extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Qualities_model');
			$this->load->model('Users_model');
			$this->load->model('Status_model');
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
					'title' => SITE_NAME . ' | Calidades',
					'styles' => array(
						base_url('public/css/libs/dataTables.bootstrap.min.css'),
						'https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css',
						base_url('public/css/dashboard.css')
					),
					'scripts' => array(
						base_url('public/js/libs/jquery.dataTables.min.js'),
						base_url('public/js/libs/dataTables.bootstrap.min.js'),
						'https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js',
						'//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js',
						base_url('public/js/qualities.js')
					),
					'get_all_qualities' => $this->Qualities_model->get_all_qualities(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/qualities/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [add description]
		*/
		public function add(){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => SITE_NAME . ' | Calidades',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/qualities.js')),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/qualities/add');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [insert description]
		* @return [type] [description]
		*/
		public function insert(){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$insert = array(
					'quality_name' => trim($this->input->post('quality_name_insert')), 
					'quality_slug' => trim($this->input->post('quality_slug_insert')), 
					'quality_status' => trim($this->input->post('quality_status_insert'))
				);
				$this->Qualities_model->insert_model($insert);
			}			
		}

		/**
		* [view description]
		* @param  [type] $id_quality [description]
		* @return [type]            [description]
		*/
		public function view($id_quality){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => SITE_NAME . ' | Calidades',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/qualities.js')),
					'view_quality' => $this->Qualities_model->get_quality_by('id_quality', $id_quality),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/qualities/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [edit description]
		* @param  [type] $id_quality [description]
		* @return [type]            [description]
		*/
		public function edit($id_quality){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => SITE_NAME . ' | Calidades',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/qualities.js')),
					'id_quality_encryp' => $id_quality,
					'edit_quality' => $this->Qualities_model->get_quality_by('id_quality', $id_quality),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/qualities/edit');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [update description]
		* @return [type] [description]
		*/
		public function update(){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$update = array(
					'id_quality' => trim($this->input->post('id_quality_update')), 
					'quality_name' => trim($this->input->post('quality_name_update')), 
					'quality_slug' => trim($this->input->post('quality_slug_update')), 
					'quality_status' => trim($this->input->post('quality_status_update'))
				);
				$this->Qualities_model->update_model($update);
			}			
		}

		/**
		* [delete description]
		* @return [type] [description]
		*/
		public function delete(){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$id_quality = trim($this->input->post('id_quality_delete'));
				
				$this->Qualities_model->delete_model($id_quality);
			}			
		}
	}
?>
