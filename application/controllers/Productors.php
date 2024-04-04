<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Productors extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Movie_model');
			$this->load->model('Productor_model');
			$this->load->model('Gender_model');
			$this->load->model('Category_model');
			$this->load->model('User_model');
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
					'title' => constant('APP_NAME') . ' | Productores',
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
						base_url('public/js/productors.js')
					),
					'get_all_productors' => $this->Productor_model->get_all_productors(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/productors/container');
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
					'title' => constant('APP_NAME') . ' | Productores',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/productors.js')),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/productors/add');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [insert description]
		* @return [type] [description]
		*/
		public function insert(){
			$config['upload_path'] = FOLDER_PRODUCTORS;
        	$config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('productor_image_logo_insert')){ 
                $insert = array(
                	'productor_name' => trim($this->input->post('productor_name_insert')), 
                	'productor_slug' => trim($this->input->post('productor_slug_insert')),
                	'productor_status' => trim($this->input->post('productor_status_insert')),
                	'productor_image_logo' => $this->upload->data()['file_name']
                );
                $this->Productor_model->insert_model($insert);
            } else { 
            	echo "ErrorUP"; 
            }		        
		}

		/**
		* [view description]
		* @param  [type] $id_productor [description]
		* @return [type]               [description]
		*/
		public function view($id_productor){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Productores',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/productors.js')),
					'id_productor_encryp' => $id_productor,
					'view_productor' => $this->Productor_model->get_productor_by('id_productor', $id_productor),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/productors/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [filter_by description]
		* @param  [type] $id_productor [description]
		* @return [type]               [description]
		*/
		public function filter_by($id_productor){
			$total_rows = 0;
			if ($this->Movie_model->get_count_movies_by_productor($id_productor) != FALSE) {
				$total_rows = $this->Movie_model->get_count_movies_by_productor($id_productor)->num_rows();
			}else{
				$total_rows = 0;
			}

			$config = array();
	       	$config['base_url'] = base_url() . 'productors/filter_by/' . $id_productor . '/';
	       	$config['total_rows'] = $total_rows;
	       	$config['per_page'] = 4; 
    		$config['uri_segment'] = 4;
    		
			// $config['num_links'] = round(($this->Movie_model->get_all_movies_activated()->num_rows() / 8));
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
	       	
	       	$results_paginated = $this->Productor_model->get_movies_by_productor($config['per_page'], $this->uri->segment(4), 'cm_pro_mov.id_productor', decryp($id_productor));
	       	$links_created = $this->pagination->create_links();

			$params = array(
				'title' => constant('APP_NAME') . ' - Búsqueda por productor',
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
				'view_productor' => $this->Productor_model->get_productor_by('id_productor', $id_productor),
				'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
				'get_new_movies' => $this->Movie_model->get_new_movies(8),		
				'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),	
				'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),	
				'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),	
				'results_paginated' => $results_paginated,
				'links_created'=> $links_created,				
				'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
			);
			$this->load->view('header', $params);				
			$this->load->view('layouts/welcome/navbar');				
			$this->load->view('layouts/welcome/carousel-news');				
			$this->load->view('layouts/welcome/carousel-views');				
			$this->load->view('partials/welcome/filter_by_productors');				
			$this->load->view('layouts/welcome/footer');				
			$this->load->view('footer');
		}

		/**
		* [edit description]
		* @param  [type] $id_productor [description]
		* @return [type]               [description]
		*/
		public function edit($id_productor){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Productores',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/productors.js')),
					'id_productor_encryp' => $id_productor,
					'edit_productor' => $this->Productor_model->get_productor_by('id_productor', $id_productor),
					'get_all_status' => $this->Status_model->get_all_status(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/productors/edit');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [update description]
		* @return [type] [description]
		*/
		public function update(){
			$config['upload_path'] = FOLDER_PRODUCTORS;
        	$config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('productor_image_logo_update') ) {
				/* Update with Old Image */
				$update = array(
					'id_productor' => $this->input->post('id_productor_update'),
					'productor_name' => trim($this->input->post('productor_name_update')), 
					'productor_slug' => trim($this->input->post('productor_slug_update')),
					'productor_status' => trim($this->input->post('productor_status_update')),
					'old_image_logo' => trim($this->input->post('image_logo_update_route')),
					'new_image_logo' => NULL
				);
				$this->Productor_model->update_model($update);
				/* END Update with Old Image */
			} else {
				/* Upload and Update with New Image */            		
				$update = array(
					'id_productor' => $this->input->post('id_productor_update'),
					'productor_name' => trim($this->input->post('productor_name_update')), 
					'productor_slug' => trim($this->input->post('productor_slug_update')),
					'productor_status' => trim($this->input->post('productor_status_update')),
					'new_image_logo' => $this->upload->data()['file_name'],
					'old_image_logo' => NULL,
					'old_image_ext' => substr(trim($this->input->post('image_logo_update_route')), -4)
					/* 'image_logo' => FOLDER_PRODUCTORS . decryp($this->input->post('id_productor_update_productor')) . '_logo' . substr($this->upload->data()['file_name'], -4) */
				);
				$this->Productor_model->update_model($update);
				/* END Upload and Update with New Image */            		
			}            
		}

		/**
		* [edit_logo description]
		* @param  [type] $id_productor [description]
		* @return [type]               [description]
		*/
		public function edit_logo($id_productor){
			if (!$this->session->userdata('is_admin_logged_in') &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Productores',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/productors.js')),
					'id_productor_encryp' => $id_productor,
					'view_productor' => $this->Productor_model->get_productor_by('id_productor', $id_productor),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/productors/logo');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}
		}

		/**
		* [update_logo description]
		* @return [type] [description]
		*/
		public function update_logo(){
			if (!$this->session->userdata('is_admin_logged_in')  &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$config['upload_path'] = FOLDER_PRODUCTORS;
	        	$config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = 2048;

	            $this->load->library('upload', $config);

	            if ( $this->upload->do_upload('productor_image_logo_customize')){ 
	            	$update = array(
	            		'id_productor' => $this->input->post('id_productor_customize_logo'), 	            		
	            		'productor_image_logo' => $this->upload->data()['file_name'],
	            		'old_image_ext' => substr(trim($this->input->post('image_logo_update_route')), -4)
	            	);
	            	$this->Productor_model->update_logo($update);
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
			if (!$this->session->userdata('is_admin_logged_in')  &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$id_productor = $this->input->post('id_productor_delete');

				$this->Productor_model->delete_model($id_productor);
			}			
		}
	}
?>
