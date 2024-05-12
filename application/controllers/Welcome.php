<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	private array $_common;

	public function __construct()
	{
		parent::__construct();

		$this->load->model([
			'User_model',
			'Productor_model',
			'Gender_model',
			'Category_model',
			'Movie_model'
		]);

		$this->load->helper('text');

		$this->load->library('pagination');

		$this->_init_();
	}

	private function _init_(): void
	{
		$this->_common = [
			'styles' => [
				base_url('public/css/libs/owl.carousel.css'),
				base_url('public/css/libs/owl.theme.css'),
				base_url('public/css/libs/owl.transitions.css'),
				base_url('public/css/welcome.css')
			],
			'scripts' => [
				base_url('public/js/libs/owl.carousel.min.js'),
				base_url('public/js/welcome.js')
			],
			'productors' => $this->Productor_model->index(['status' => 1]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'categories' => $this->Category_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user')),
			'newest_movies' => $this->Movie_model->index([
				'status' => 1,
				'limit' => 8
			]),
			'viewed_movies' => $this->Movie_model->index([
				'status' => 1,
				'order_column' => 'movie_reproductions',
				'order_filter' => 'DESC',
				'limit' => 8
			])
		];
	}

	private function _create_paginator_(array &$config): void
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

	public function index(): void
	{
		$details = ['status' => 1];

		$data = $this->Movie_model->index($details);

		$config['base_url'] = site_url();
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 8;
		$config['uri_segment'] = 1;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => '¡Bienvenido a ' . constant('APP_NAME') . '!',
			...$this->_common,
			'results' => $this->Movie_model->index(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/viewed-carousel');
		$this->load->view('partials/welcome/index');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function search(): void
	{
		$search_parameter = url_title($this->input->post('search_parameter'), ' ', true);
		
		redirect("results/{$search_parameter}");
	}

	public function results(string $search_parameter): void
	{
		$search_parameter = urldecode($search_parameter);

		$details = ['status' => 1, 'value' => $search_parameter];

		$data = $this->Movie_model->search_results($details);

		$config['base_url'] = site_url("results/{$search_parameter}");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda',
			...$this->_common,
			'search_parameter' => $search_parameter,
			'results' => $this->Movie_model->search_results(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/viewed-carousel');
		$this->load->view('partials/welcome/results');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_productor(string $slug): void
	{
		$details = [
			'status' => 1,
			'search' => 'productor_slug',
			'value' => $slug
		];

		$data = $this->Productor_model->movies_by_productor($details);

		$config['base_url'] = site_url("productor/{$slug}/filter");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por productor',
			...$this->_common,
			'productor' => $this->Productor_model->fetch(['search' => 'productor_slug', 'value' => $slug])->row_array(),
			'results' => $this->Productor_model->movies_by_productor(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/viewed-carousel');
		$this->load->view('partials/welcome/filter_by_productor');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_gender(string $slug): void
	{
		$details = [
			'status' => 1,
			'search' => 'gender_slug',
			'value' => $slug
		];

		$data = $this->Gender_model->movies_by_gender($details);

		$config['base_url'] = site_url("gender/{$slug}/filter");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por género',
			...$this->_common,
			'gender' => $this->Gender_model->fetch(['search' => 'gender_slug', 'value' => $slug])->row_array(),
			'results' => $this->Gender_model->movies_by_gender(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/viewed-carousel');
		$this->load->view('partials/welcome/filter_by_gender');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_category(string $slug): void
	{
		$details = [
			'status' => 1,
			'search' => 'category_slug',
			'value' => $slug
		];

		$data = $this->Category_model->movies_by_category($details);

		$config['base_url'] = site_url("category/{$slug}/filter");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por categoría',
			...$this->_common,
			'category' => $this->Category_model->fetch(['search' => 'category_slug', 'value' => $slug])->row_array(),
			'results' => $this->Category_model->movies_by_category(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/viewed-carousel');
		$this->load->view('partials/welcome/filter_by_category');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function watch(string $slug): void
	{
		$movie = $this->Movie_model->fetch(['search' => 'movie_slug', 'value' => $slug])->row_array();

		if (!is_null($movie)) {
			$title = constant('APP_NAME') . ' - ' . $movie['movie_name'];
			$this->Movie_model->increase_views($movie['movie_slug']);
		}

		$params = [
			'title' => $title ?? constant('APP_NAME'),
			...$this->_common,
			'movie' => $movie
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('partials/welcome/watch');
		$this->load->view('layouts/welcome/newest-carousel');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}
}
