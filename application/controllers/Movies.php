<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Movies extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'Movie_model',
			'Productor_model',
			'Gender_model',
			'Category_model',
			'Quality_model',
			'User_model',
			'Status_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/libs/dataTables.bootstrap.min.css'),
				base_url('public/css/libs/buttons.bootstrap.min.css'),
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/libs/jszip.min.js'),
				base_url('public/js/libs/pdfmake.min.js'),
				base_url('public/js/libs/vfs_fonts.js'),
				base_url('public/js/libs/dataTables.min.js'),
				base_url('public/js/libs/dataTables.bootstrap.min.js'),
				base_url('public/js/libs/dataTables.buttons.min.js'),
				base_url('public/js/libs/buttons.bootstrap.min.js'),
				base_url('public/js/libs/buttons.html5.min.js'),
				['type' => 'module', 'src' => base_url('public/js/movies.js')]
			],
			'movies' => $this->Movie_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create(): void
	{
		$this->load->helper('countries');

		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css',
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/libs/moment.js'),
				base_url('public/js/libs/moment-with-locales.js'),
				base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js',
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js',
				['type' => 'module', 'src' => base_url('public/js/movies.js')]
			],
			'productors' => $this->Productor_model->index(['status' => 1]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'categories' => $this->Category_model->index(['status' => 1]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'qualities' => $this->Quality_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/create');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store(): void
	{
		echo $this->Movie_model->store([
			'productors' => $this->input->post('productors'),
			'genders' => $this->input->post('genders'),
			'categories' => $this->input->post('categories'),
			'status_id' => $this->input->post('status'),
			'quality_id' => $this->input->post('quality'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'release_date' => $this->input->post('release_date'),
			'duration' => $this->input->post('duration'),
			'country_origin' => $this->input->post('country_origin'),
			'link' => $this->input->post('link')
		]);
	}

	public function view(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/movies.js')]
			],
			'productors_by_movie' => $this->Movie_model->productors_by_movie(['value' => $id]),
			'genders_by_movie' => $this->Movie_model->genders_by_movie(['value' => $id]),
			'categories_by_movie' => $this->Movie_model->categories_by_movie(['value' => $id]),
			'movie' => $this->Movie_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit(int $id): void
	{
		$this->load->helper('countries');

		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css',
				base_url('public/css/dashboard.css'),
			],
			'scripts' => [
				base_url('public/js/libs/moment.js'),
				base_url('public/js/libs/moment-with-locales.js'),
				base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js',
				'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js',
				['type' => 'module', 'src' => base_url('public/js/movies.js')]
			],
			'productors' => $this->Productor_model->index(['status' => 1]),
			'productors_by_movie' => $this->Movie_model->productors_by_movie(['value' => $id]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'genders_by_movie' => $this->Movie_model->genders_by_movie(['value' => $id]),
			'categories' => $this->Category_model->index(['status' => 1]),
			'categories_by_movie' => $this->Movie_model->categories_by_movie(['value' => $id]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'qualities' => $this->Quality_model->index(['status' => 1]),
			'movie' => $this->Movie_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update(): void
	{
		echo $this->Movie_model->update([
			'id' => $this->input->post('movie'),
			'productors' => $this->input->post('productors'),
			'genders' => $this->input->post('genders'),
			'categories' => $this->input->post('categories'),
			'status_id' => $this->input->post('status'),
			'quality_id' => $this->input->post('quality'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'release_date' => $this->input->post('release_date'),
			'duration' => $this->input->post('duration'),
			'country_origin' => $this->input->post('country_origin'),
			'link' => $this->input->post('link')
		]);
	}

	public function edit_cover(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/movies.js')]
			],
			'movie' => $this->Movie_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/cover');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_cover(): void
	{
		$config['upload_path'] = FOLDER_MOVIES;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('cover')) {
			echo 'not-upload';
		}

		$data = $this->upload->data();

		echo $this->Movie_model->update_cover([
			'id' => $this->input->post('movie'),
			'cover' => $data['file_name']
		]);
	}

	public function delete(): void
	{
		echo $this->Movie_model->delete(['id' => $this->input->post('movie')]);
	}
}
