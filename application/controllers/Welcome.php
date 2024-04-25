<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	private array $_styles;
	private array $_scripts;

	public function __construct()
	{
		parent::__construct();

		$this->_styles = [
			base_url('public/css/libs/owl.carousel.css'),
			base_url('public/css/libs/owl.theme.css'),
			base_url('public/css/libs/owl.transitions.css'),
			base_url('public/css/welcome.css')
		];

		$this->_scripts = [
			base_url('public/js/libs/owl.carousel.min.js'),
			base_url('public/js/welcome.js')
		];

		$this->load->model([
			'Movie_model',
			'Productor_model',
			'Gender_model',
			'Category_model',
			'User_model'
		]);

		$this->load->library('pagination');
	}

	private function _create_paginator_(&$config)
	{
		$config['full_tag_open']  = '<nav aria-label="Page navigation"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
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
	}

	public function index()
	{
		$config['base_url'] = site_url('welcome/index/');
		$config['total_rows'] = $this->Movie_model->get_all_movies_activated()->num_rows();
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$results_paginated = $this->Movie_model->fetch_movies($config['per_page'], $this->uri->segment(3));
		$paginator = $this->pagination->create_links();

		$params = [
			'title' => '¡Bienvenido a ' . constant('APP_NAME') . '!',
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'results_paginated' => $results_paginated,
			'paginator' => $paginator,
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/container');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function search()
	{
		redirect('welcome/results/' . strtolower(trim($this->input->post('movie_name_search'))));
	}

	public function results($movie_name_search)
	{
		$movie_name_search = urldecode($movie_name_search);

		$total_rows = 0;
		if ($this->Movie_model->get_count_movies_by_search($movie_name_search) != FALSE) {
			$total_rows = $this->Movie_model->get_count_movies_by_search($movie_name_search)->num_rows();
		}

		$config['base_url'] = site_url("welcome/results/{$movie_name_search}/");
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$results_paginated = $this->Movie_model->get_movies_by_search($config['per_page'], $this->uri->segment(4), $movie_name_search);
		$paginator = $this->pagination->create_links();

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda',
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'results_paginated' => $results_paginated,
			'paginator' => $paginator,
			'param_search' => $movie_name_search,
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/results');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_productor($id_productor)
	{
		$total_rows = 0;
		if ($this->Movie_model->get_count_movies_by_productor($id_productor) != FALSE) {
			$total_rows = $this->Movie_model->get_count_movies_by_productor($id_productor)->num_rows();
		}

		$config['base_url'] = site_url("welcome/filter_by_productor/{$id_productor}/");
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$results_paginated = $this->Productor_model->get_movies_by_productor($config['per_page'], $this->uri->segment(4), 'cm_pro_mov.id_productor', decryp($id_productor));
		$paginator = $this->pagination->create_links();

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por productor',
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'view_productor' => $this->Productor_model->get_productor_by('id_productor', $id_productor),
			'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'results_paginated' => $results_paginated,
			'paginator' => $paginator,
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_productors');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_gender($id_gender)
	{
		$total_rows = 0;
		if ($this->Movie_model->get_count_movies_by_gender($id_gender) != FALSE) {
			$total_rows = $this->Movie_model->get_count_movies_by_gender($id_gender)->num_rows();
		}

		$config['base_url'] = site_url("welcome/filter_by_gender/{$id_gender}/");
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$results_paginated = $this->Gender_model->get_movies_by_gender($config['per_page'], $this->uri->segment(4), 'cm_gen_mov.id_gender', decryp($id_gender));
		$paginator = $this->pagination->create_links();

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por género',
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'view_gender' => $this->Gender_model->get_gender_by('id_gender', $id_gender),
			'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'results_paginated' => $results_paginated,
			'paginator' => $paginator,
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_genders');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_category($id_category)
	{
		$total_rows = 0;
		if ($this->Movie_model->get_count_movies_by_category($id_category) != FALSE) {
			$total_rows = $this->Movie_model->get_count_movies_by_category($id_category)->num_rows();
		}

		$config['base_url'] = site_url("welcome/filter_by_category/{$id_category}/");
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$results_paginated = $this->Category_model->get_movies_by_category($config['per_page'], $this->uri->segment(4), 'cm_cat_mov.id_category', decryp($id_category));
		$paginator = $this->pagination->create_links();

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por categoría',
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'view_category' => $this->Category_model->get_category_by('id_category', $id_category),
			'get_movies_most_viewed' => $this->Movie_model->get_movies_most_viewed(8),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'results_paginated' => $results_paginated,
			'paginator' => $paginator,
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_categories');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function watch($id_movie)
	{
		$fetch_movie = $this->Movie_model->get_movie_by('id_movie', $id_movie);

		$params = [
			'title' => constant('APP_NAME') . ' - ' . $fetch_movie->movie_name,
			'styles' => $this->_styles,
			'scripts' => $this->_scripts,
			'watch_movie' => $fetch_movie,
			'update_reproductions' => $this->Movie_model->update_reproductions($id_movie),
			'get_new_movies' => $this->Movie_model->get_new_movies(8),
			'get_all_productors_activated' => $this->Productor_model->get_all_productors_activated(),
			'get_all_genders_activated' => $this->Gender_model->get_all_genders_activated(),
			'get_all_categories_activated' => $this->Category_model->get_all_categories_activated(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('partials/welcome/watch');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}
}
