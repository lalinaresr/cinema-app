<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Genders extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Movies_model');
			$this->load->model('Productors_model');
			$this->load->model('Genders_model');
			$this->load->model('Categorys_model');
			$this->load->model('Users_model');
			$this->load->model('Status_model');

			$this->load->library('pagination');
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
					'title' => constant('APP_NAME') . ' | Géneros',
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
						base_url('public/js/genders.js')
					),
					'get_all_genders' => $this->Genders_model->get_all_genders(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/genders/container');
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
					'title' => constant('APP_NAME') . ' | Géneros',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/genders.js')),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/genders/add');
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
					'gender_name' => trim($this->input->post('gender_name_insert')), 
					'gender_slug' => trim($this->input->post('gender_slug_insert')), 
					'gender_status' => trim($this->input->post('gender_status_insert'))
				);
				$this->Genders_model->insert_model($insert);
			}			
		}

		/**
		* [view description]
		* @param  [type] $id_gender [description]
		* @return [type]            [description]
		*/
		public function view($id_gender){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Géneros',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/genders.js')),
					'view_gender' => $this->Genders_model->get_gender_by('id_gender', $id_gender),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/genders/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [filter_by description]
		* @param  [type] $id_gender [description]
		* @return [type]            [description]
		*/
		public function filter_by($id_gender){
			$total_rows = 0;
			if ($this->Movies_model->get_count_movies_by_gender($id_gender) != FALSE) {
				$total_rows = $this->Movies_model->get_count_movies_by_gender($id_gender)->num_rows();
			}else{
				$total_rows = 0;
			}

			$config = array();
	       	$config['base_url'] = base_url() . 'genders/filter_by/' . $id_gender . '/';
	       	$config['total_rows'] = $total_rows;
	       	$config['per_page'] = 4; 
    		$config['uri_segment'] = 4;
    		
			// $config['num_links'] = round(($this->Movies_model->get_all_movies_activated()->num_rows() / 8));
			// $config['use_page_numbers'] = TRUE;

	       	$config['full_tag_open']  = '<nav aria-label="Page navigation"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav><!--pagination-->';
			$config['first_link'] = '&laquo; Primera';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Última &raquo;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Siguiente <span class="glyphicon glyphicon-chevron-right"></span>';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span> Anterior';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';

	       	$this->pagination->initialize($config);
	       	
	       	$results_paginated = $this->Genders_model->get_movies_by_gender($config['per_page'], $this->uri->segment(4), 'cm_gen_mov.id_gender', decryp($id_gender));
	       	$links_created = $this->pagination->create_links();

			$params = array(
				'title' => constant('APP_NAME') . ' - Búsqueda por género',
				'styles' => array(
					base_url('public/css/libs/owl.carousel.css'),
					base_url('public/css/libs/owl.theme.css'),
					base_url('public/css/libs/owl.transitions.css'),
					base_url('public/css/welcome.css')
				),
				'scripts' => array(
					base_url('public/js/libs/owl.carousel.min.js'),
					base_url('public/js/welcome.js')
				),
				'view_gender' => $this->Genders_model->get_gender_by('id_gender', $id_gender),
				'get_movies_most_viewed' => $this->Movies_model->get_movies_most_viewed(8),
				'get_new_movies' => $this->Movies_model->get_new_movies(8),		
				'get_all_productors_activated' => $this->Productors_model->get_all_productors_activated(),	
				'get_all_genders_activated' => $this->Genders_model->get_all_genders_activated(),	
				'get_all_categorys_activated' => $this->Categorys_model->get_all_categorys_activated(),	
				'results_paginated' => $results_paginated,
				'links_created'=> $links_created,				
				'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
			);
			$this->load->view('header', $params);				
			$this->load->view('layouts/welcome/navbar');				
			$this->load->view('layouts/welcome/carousel-news');				
			$this->load->view('layouts/welcome/carousel-views');				
			$this->load->view('partials/welcome/filter_by_genders');				
			$this->load->view('layouts/welcome/footer');				
			$this->load->view('footer');
		}

		/**
		* [edit description]
		* @param  [type] $id_gender [description]
		* @return [type]            [description]
		*/
		public function edit($id_gender){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Géneros',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/genders.js')),
					'id_gender_encryp' => $id_gender,
					'edit_gender' => $this->Genders_model->get_gender_by('id_gender', $id_gender),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/genders/edit');
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
					'id_gender' => trim($this->input->post('id_gender_update')), 
					'gender_name' => trim($this->input->post('gender_name_update')), 
					'gender_slug' => trim($this->input->post('gender_slug_update')), 
					'gender_status' => trim($this->input->post('gender_status_update'))
				);
				$this->Genders_model->update_model($update);
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
				$id_gender = trim($this->input->post('id_gender_delete'));
				
				$this->Genders_model->delete_model($id_gender);
			}			
		}
	}
?>
