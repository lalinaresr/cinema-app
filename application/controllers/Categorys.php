<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Categorys extends CI_Controller {

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
					'page_title' => SITE_NAME . ' | Categorías',
					'css_files' => array(
						base_url() . 'assets/css/bootstrap.min.css',
						base_url() . 'assets/css/font-awesome.min.css',
						base_url() . 'assets/plugins/dataTables/css/dataTables.bootstrap.min.css',
						'https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css',
						'https://fonts.googleapis.com/css?family=Ubuntu',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css', 
						base_url() . 'assets/css/snipps/dashboard.css',
						base_url() . 'assets/css/styles.css'
					),
					'js_files' => array(
						base_url() . 'assets/js/jquery-3.2.1.js',
						base_url() . 'assets/js/jquery.form.min.js',
						base_url() . 'assets/js/bootstrap.min.js',
						base_url() . 'assets/plugins/dataTables/js/jquery.dataTables.min.js',
						base_url() . 'assets/plugins/dataTables/js/dataTables.bootstrap.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js',
						'//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js',
						base_url() . 'assets/js/executes/dataTables.js',
						base_url() . 'assets/js/snipps/categorys.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					),
					'get_all_categorys' => $this->Categorys_model->get_all_categorys(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/categorys/container');
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
					'page_title' => SITE_NAME . ' | Categorías',
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
						base_url() . 'assets/js/executes/dataTables.js',
						base_url() . 'assets/js/snipps/categorys.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/categorys/add');
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
					'category_name' => trim($this->input->post('category_name_insert')), 
					'category_slug' => trim($this->input->post('category_slug_insert')), 
					'category_status' => trim($this->input->post('category_status_insert'))
				);
				$this->Categorys_model->insert_model($insert);
			}
		}

		/**
		* [view description]
		* @param  [type] $id_category [description]
		* @return [type]              [description]
		*/
		public function view($id_category){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'page_title' => SITE_NAME . ' | Categorías',
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
						base_url() . 'assets/js/executes/dataTables.js',
						base_url() . 'assets/js/snipps/categorys.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					),
					'view_category' => $this->Categorys_model->get_category_by('id_category', $id_category),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/categorys/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [filter_by description]
		* @param  [type] $id_category [description]
		* @return [type]              [description]
		*/
		public function filter_by($id_category){
			$total_rows = 0;
			if ($this->Movies_model->get_count_movies_by_category($id_category) != FALSE) {
				$total_rows = $this->Movies_model->get_count_movies_by_category($id_category)->num_rows();
			}else{
				$total_rows = 0;
			}

			$config = array();
	       	$config['base_url'] = base_url() . 'categorys/filter_by/' . $id_category . '/';
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
	       	
	       	$results_paginated = $this->Categorys_model->get_movies_by_category($config['per_page'], $this->uri->segment(4), 'cm_cat_mov.id_category', decryp($id_category));
	       	$links_created = $this->pagination->create_links();

			$params = array(
				'page_title' => SITE_NAME . ' - Búsqueda por categoría',
				'css_files' => array(
					base_url() . 'assets/css/bootstrap.min.css',
					base_url() . 'assets/css/font-awesome.min.css',
					base_url() . 'assets/plugins/owl-carousel/owl.carousel.css',
					base_url() . 'assets/plugins/owl-carousel/owl.theme.css',
					base_url() . 'assets/plugins/owl-carousel/owl.transitions.css',
					base_url() . 'assets/css/executes/owlCarousels.css',
					'https://fonts.googleapis.com/css?family=Ubuntu',
					base_url() . 'assets/css/snipps/welcome.css',
					base_url() . 'assets/css/styles.css'
				),
				'js_files' => array(
					base_url() . 'assets/js/jquery.min.js',
					base_url() . 'assets/js/jquery.form.min.js',
					base_url() . 'assets/js/bootstrap.min.js',
					base_url() . 'assets/plugins/owl-carousel/owl.carousel.min.js',
					base_url() . 'assets/js/executes/owlCarousels.js',
					base_url() . 'assets/js/snipps/auth.js',
					base_url() . 'assets/js/site.js'
				),
				'view_category' => $this->Categorys_model->get_category_by('id_category', $id_category),
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
			$this->load->view('partials/welcome/filter_by_categorys');				
			$this->load->view('layouts/welcome/footer');				
			$this->load->view('footer');
		}

		/**
		* [edit description]
		* @param  [type] $id_category [description]
		* @return [type]              [description]
		*/
		public function edit($id_category){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'page_title' => SITE_NAME . ' | Categorías',
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
						base_url() . 'assets/js/executes/dataTables.js',
						base_url() . 'assets/js/snipps/categorys.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
					),
					'id_category_encryp' => $id_category,
					'edit_category' => $this->Categorys_model->get_category_by('id_category', $id_category),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/categorys/edit');
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
					'id_category' => trim($this->input->post('id_category_update')), 
					'category_name' => trim($this->input->post('category_name_update')), 
					'category_slug' => trim($this->input->post('category_slug_update')), 
					'category_status' => trim($this->input->post('category_status_update'))
				);
				$this->Categorys_model->update_model($update);
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
				$id_category = trim($this->input->post('id_category_delete'));
				
				$this->Categorys_model->delete_model($id_category);
			}			
		}
	}
?>
