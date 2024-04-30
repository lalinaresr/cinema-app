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

		$this->_init_();

		$this->load->library('pagination');
	}

	private function _init_()
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
			'newest_movies' => $this->Movie_model->index([
				'status' => 1,
				'limit' => 8
			]),
			'viewed_movies' => $this->Movie_model->index([
				'status' => 1,
				'order_column' => 'movie_reproductions',
				'order_filter' => 'DESC',
				'limit' => 8
			]),
			'productors' => $this->Productor_model->index(['status' => 1]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'categories' => $this->Category_model->index(['status' => 1]),
		];
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
		$details = ['status' => 1];

		$data = $this->Movie_model->index($details);

		$config['base_url'] = site_url('welcome/index/');
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => '¡Bienvenido a ' . constant('APP_NAME') . '!',
			'results' => $this->Movie_model->index(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links(),
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
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
		redirect('welcome/results/' . strtolower(trim($this->input->post('search_parameter'))));
	}

	public function results($search_parameter)
	{
		$search_parameter = urldecode($search_parameter);

		$details = ['status' => 1, 'value' => $search_parameter];

		$data = $this->Movie_model->search_results($details);

		$config['base_url'] = site_url("welcome/results/{$search_parameter}/");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda',
			'results' => $this->Movie_model->search_results(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links(),
			'search_parameter' => $search_parameter,
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/results');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_productor($id)
	{
		$details = [
			'status' => 1,
			'search' => 'cm_pro_mov.id_productor',
			'value' => $id,
			'decrypt' => true
		];

		$data = $this->Productor_model->movies_by_productor($details);

		$config['base_url'] = site_url("welcome/filter_by_productor/{$id}/");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por productor',
			'productor' => $this->Productor_model->fetch(['value' => $id, 'decrypt' => true])->row_array(),
			'results' => $this->Productor_model->movies_by_productor(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links(),
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_productors');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_gender($id)
	{
		$details = [
			'status' => 1,
			'search' => 'cm_gen_mov.id_gender',
			'value' => $id,
			'decrypt' => true
		];

		$data = $this->Gender_model->movies_by_gender($details);

		$config['base_url'] = site_url("welcome/filter_by_gender/{$id}/");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por género',
			'gender' => $this->Gender_model->fetch(['value' => $id, 'decrypt' => true])->row_array(),
			'results' => $this->Gender_model->movies_by_gender(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links(),
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_genders');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function filter_by_category($id)
	{
		$details = [
			'status' => 1,
			'search' => 'cm_cat_mov.id_category',
			'value' => $id,
			'decrypt' => true
		];

		$data = $this->Category_model->movies_by_category($details);

		$config['base_url'] = site_url("welcome/filter_by_category/{$id}/");
		$config['total_rows'] = ($data ? $data->num_rows() : 0);
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$this->_create_paginator_($config);
		$this->pagination->initialize($config);

		$params = [
			'title' => constant('APP_NAME') . ' - Búsqueda por categoría',
			'category' => $this->Category_model->fetch(['value' => $id, 'decrypt' => true])->row_array(),
			'results' => $this->Category_model->movies_by_category(['limit' => $config['per_page'], 'start' => $this->uri->segment($config['uri_segment']), ...$details]),
			'paginator' => $this->pagination->create_links(),
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/carousel-views');
		$this->load->view('partials/welcome/filter_by_categories');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}

	public function watch($id)
	{
		$movie = $this->Movie_model->fetch(['value' => $id, 'decrypt' => true])->row_array();

		$params = [
			'title' => constant('APP_NAME') . ' - ' . $movie['movie_name'],
			'movie' => $movie,
			'increase_views' => $this->Movie_model->increase_views($id),
			...$this->_common,
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/welcome/navbar');
		$this->load->view('partials/welcome/watch');
		$this->load->view('layouts/welcome/carousel-news');
		$this->load->view('layouts/welcome/footer');
		$this->load->view('footer');
	}
}
