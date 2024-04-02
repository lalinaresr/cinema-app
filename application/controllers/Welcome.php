<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {

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
		public function index(){
			$config = array();
	       	$config['base_url'] = base_url() . 'welcome/index/';
	       	$config['total_rows'] = $this->Movies_model->get_all_movies_activated()->num_rows();
	       	$config['per_page'] = 8; 
    		$config['uri_segment'] = 3;
    		
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
	       	
	       	$results_paginated = $this->Movies_model->fetch_movies($config['per_page'], $this->uri->segment(3));
	       	$links_created = $this->pagination->create_links();
			
			$params = array(
				'page_title' => '¡Bienvenido a ' . SITE_NAME . '!',
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
			$this->load->view('partials/welcome/container');
			$this->load->view('layouts/welcome/footer');
			$this->load->view('footer');
		}			
	}
?>
