<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Results extends CI_Controller {

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

			$this->load->library('pagination');
		}

		/**
		* [index description]
		* @return [type] [description]
		*/
		public function index(){ redirect(); }

		public function pre_search_query(){ redirect('results/search_query/' . strtolower(trim($this->input->post('movie_name_search'))) ); }
		
		/**
		* [index description]
		* @return [type] [description]
		*/
		public function search_query($movie_name_search){
			$movie_name_search = urldecode($movie_name_search);

			$total_rows = 0;
			if ($this->Movies_model->get_count_movies_by_search($movie_name_search) != FALSE) {
				$total_rows = $this->Movies_model->get_count_movies_by_search($movie_name_search)->num_rows();
			}else{
				$total_rows = 0;
			}

			$config = array();
	       	$config['base_url'] = base_url() . 'results/search_query/' . $movie_name_search  . '/';
	       	$config['total_rows'] = $total_rows;
	       	$config['per_page'] = 4; 
    		$config['uri_segment'] = 4;

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
	       	
	       	$results_paginated = $this->Movies_model->get_movies_by_search($config['per_page'], $this->uri->segment(4), $movie_name_search);
	       	$links_created = $this->pagination->create_links();
			
			$params = array(
				'title' => SITE_NAME . ' - Búsqueda',
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
				'get_movies_most_viewed' => $this->Movies_model->get_movies_most_viewed(8),
				'get_new_movies' => $this->Movies_model->get_new_movies(8),			
				'get_all_productors_activated' => $this->Productors_model->get_all_productors_activated(),	
				'get_all_genders_activated' => $this->Genders_model->get_all_genders_activated(),	
				'get_all_categorys_activated' => $this->Categorys_model->get_all_categorys_activated(),	
				'results_paginated' => $results_paginated,
				'links_created'=> $links_created,
				'param_search' => $movie_name_search,
				'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				
			);
			$this->load->view('header', $params);				
			$this->load->view('layouts/welcome/navbar');				
			$this->load->view('layouts/welcome/carousel-news');
			$this->load->view('layouts/welcome/carousel-views');				
			$this->load->view('partials/welcome/search_query');				
			$this->load->view('layouts/welcome/footer');				
			$this->load->view('footer');		
		}		
	}
?>
