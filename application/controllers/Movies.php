<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Movies extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Movie_model');
			$this->load->model('Productor_model');
			$this->load->model('Gender_model');
			$this->load->model('Category_model');
			$this->load->model('Quality_model');
			$this->load->model('User_model');
			$this->load->model('Status_model');

			$this->load->helper('countrys');
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
					'title' => constant('APP_NAME') . ' | Películas',
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
						base_url('public/js/movies.js')
					),
					'get_all_movies' => $this->Movie_model->get_all_movies(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/movies/container');
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
					'title' => constant('APP_NAME') . ' | Películas',
					'styles' => array(
						base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css',
						base_url('public/css/dashboard.css')
					),
					'scripts' => array(
						base_url('public/js/libs/moment.js'),
						base_url('public/js/libs/moment-with-locales.js'),
						base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js',						
						base_url('public/js/movies.js')
					),
					'get_all_status' => $this->Status_model->get_all_status(),
					'get_all_qualities_activated' => $this->Quality_model->get_all_qualities_activated(),
					'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
					'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
					'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/movies/add');
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
				$config['upload_path'] = FOLDER_MOVIES;
	        	$config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = 2048;

	            $this->load->library('upload', $config);

				if ( $this->upload->do_upload('movie_cover_insert')){
					$insert = array(
						'ids_productors' => $this->input->post('ids_productors_insert'), 
						'ids_genders' => $this->input->post('ids_genders_insert'), 
						'ids_categories' => $this->input->post('ids_categories_insert'), 
						'movie_status' => trim($this->input->post('movie_status_insert')), 
						'movie_quality' => trim($this->input->post('movie_quality_insert')), 
						'movie_name' => trim($this->input->post('movie_name_insert')), 
						'movie_slug' => trim($this->input->post('movie_slug_insert')), 
						'movie_release_date' => trim($this->input->post('movie_release_date_insert')), 
						'movie_duration' => trim($this->input->post('movie_duration_insert')), 
						'movie_country_origin' => trim($this->input->post('movie_country_origin_insert')), 
						'movie_cover' => $this->upload->data()['file_name'],
						'movie_description' => trim($this->input->post('movie_description_insert')),
						'movie_play' => trim($this->input->post('movie_play_insert'))
					);
					$this->Movie_model->insert_model($insert);
				} else { 
					echo "ErrorUP"; 
				}
			}					
		}

		/**
		* [view description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function view($id_movie){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Películas',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/movies.js')),
					'id_movie_encryp' => $id_movie,
					'view_movie' => $this->Movie_model->get_movie_by('id_movie', $id_movie),
					'productors_movie' => $this->Movie_model->get_productors_movie($id_movie),
					'genders_movie' => $this->Movie_model->get_genders_movie($id_movie),
					'categories_movie' => $this->Movie_model->get_categories_movie($id_movie),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/movies/view');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}

		/**
		* [watch description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function watch($id_movie){
			$fetch_movie = $this->Movie_model->get_movie_by('id_movie', $id_movie);

			$params = array(
				'title' => constant('APP_NAME') . ' - ' . $fetch_movie->movie_name,
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
				'watch_movie' => $fetch_movie,
				'update_reproductions' => $this->Movie_model->update_reproductions($id_movie),
				'get_new_movies' => $this->Movie_model->get_new_movies(8),	
				'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),	
				'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),	
				'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),	
				'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
			);
			$this->load->view('header', $params);				
			$this->load->view('layouts/welcome/navbar');				
			$this->load->view('partials/welcome/watch');				
			$this->load->view('layouts/welcome/carousel-news');				
			$this->load->view('layouts/welcome/footer');				
			$this->load->view('footer');
		}

		/**
		* [edit description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function edit($id_movie){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Películas',
					'styles' => array(
						base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css',
						base_url('public/css/dashboard.css'),
					),
					'scripts' => array(
						base_url('public/js/libs/moment.js'),
						base_url('public/js/libs/moment-with-locales.js'),
						base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js',
						base_url('public/js/movies.js')
					),
					'id_movie_encryp' => $id_movie,
					'get_all_status' => $this->Status_model->get_all_status(),
					'edit_movie' => $this->Movie_model->get_movie_by('id_movie', $id_movie),
					'productors_movie' => $this->Movie_model->get_productors_movie($id_movie),
					'genders_movie' => $this->Movie_model->get_genders_movie($id_movie),
					'categories_movie' => $this->Movie_model->get_categories_movie($id_movie),
					'get_all_qualities_activated' => $this->Quality_model->get_all_qualities_activated(),
					'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
					'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
					'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))					
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/movies/edit');
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
				$config['upload_path'] = FOLDER_MOVIES;
			   	$config['allowed_types'] = 'gif|jpg|png';
			    $config['max_size'] = 2048;

			    $this->load->library('upload', $config);
						
				if (!$this->upload->do_upload('movie_cover_update') ) {
					/* Update with Old Image */
					$update = array(
						'id_movie' => $this->input->post('id_movie_update'),
						'ids_productors' => $this->input->post('ids_productors_update'),
						'ids_genders' => $this->input->post('ids_genders_update'),
						'ids_categories' => $this->input->post('ids_categories_update'),
	 					'movie_status' => $this->input->post('movie_status_update'),
						'movie_quality' => $this->input->post('movie_quality_update'),
						'movie_name' => $this->input->post('movie_name_update'),
						'movie_slug' => $this->input->post('movie_slug_update'),
						'movie_release_date' => $this->input->post('movie_release_date_update'),
						'movie_duration' => $this->input->post('movie_duration_update'),
						'movie_country_origin' => $this->input->post('movie_country_origin_update'),
						'old_image_cover' => $this->input->post('image_cover_update_route'),
						'new_image_cover' => NULL,
						'movie_description' => $this->input->post('movie_description_update'),
						'movie_play' => $this->input->post('movie_play_update')
					);
					$this->Movie_model->update_model($update);
					/* END Update with Old Image */
				} else {
					/* Upload and Update with New Image */            		
					$update = array(
						'id_movie' => $this->input->post('id_movie_update'),
						'ids_productors' => $this->input->post('ids_productors_update'),
						'ids_genders' => $this->input->post('ids_genders_update'),
						'ids_categories' => $this->input->post('ids_categories_update'),
						'movie_status' => $this->input->post('movie_status_update'),
						'movie_quality' => $this->input->post('movie_quality_update'),
						'movie_name' => $this->input->post('movie_name_update'),
						'movie_slug' => $this->input->post('movie_slug_update'),
						'movie_release_date' => $this->input->post('movie_release_date_update'),
						'movie_duration' => $this->input->post('movie_duration_update'),
						'movie_country_origin' => $this->input->post('movie_country_origin_update'),
						'movie_description' => $this->input->post('movie_description_update'),
						'movie_play' => $this->input->post('movie_play_update'),
						'new_image_cover' => $this->upload->data()['file_name'],
						'old_image_cover' => NULL,
						'old_image_ext' => substr(trim($this->input->post('image_cover_update_route')), -4)
						// 'image_logo' => FOLDER_MOVIES . decryp($this->input->post('id_productor_update_productor')) . '_logo' . substr($this->upload->data()['file_name'], -4)
					);
					$this->Movie_model->update_model($update);
					/* END Upload and Update with New Image */            		
				}
			}			    
		}

		/**
		* [edit_cover description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function edit_cover($id_movie){
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => constant('APP_NAME') . ' | Películas',
					'styles' => array(base_url('public/css/dashboard.css')),
					'scripts' => array(base_url('public/js/movies.js')),
					'id_movie_encryp' => $id_movie,
					'view_movie' => $this->Movie_model->get_movie_by('id_movie', $id_movie),
					'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/movies/cover');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}
		}

		/**
		* [update_cover description]
		* @return [type] [description]
		*/
		public function update_cover(){
			if (!$this->session->userdata('is_admin_logged_in')  &&
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$config['upload_path'] = FOLDER_MOVIES;
	        	$config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = 2048;

	            $this->load->library('upload', $config);

	            if ( $this->upload->do_upload('movie_cover_customize')){ 
	            	$update = array(
	            		'id_movie' => $this->input->post('id_movie_customize_cover'), 	            		
	            		'movie_cover' => $this->upload->data()['file_name'],
	            		'old_image_ext' => substr(trim($this->input->post('cover_update_route')), -4)
	            	);
	            	$this->Movie_model->update_cover($update);
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
			if (!$this->session->userdata('is_admin_logged_in') && 
				!$this->session->userdata('is_guest_logged_in')) {
				redirect(site_url());
			} else {
				$id_movie = $this->input->post('id_movie_delete');

				$this->Movie_model->delete_model($id_movie);
			}			
		}
	}
?>
