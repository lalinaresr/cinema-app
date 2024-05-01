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

		$this->load->helper('countrys');
	}

	public function index()
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
				base_url('public/js/movies.js')
			],
			'movies' => $this->Movie_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
	{
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
				base_url('public/js/movies.js')
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'qualities' => $this->Quality_model->index(['status' => 1]),
			'categories' => $this->Category_model->index(['status' => 1]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'productors' => $this->Productor_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		$config['upload_path'] = FOLDER_MOVIES;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('movie_cover_insert')) {
			echo 'not-upload';
		}

		echo $this->Movie_model->store([
			'ids_productors' => $this->input->post('ids_productors_insert'),
			'ids_genders' => $this->input->post('ids_genders_insert'),
			'ids_categories' => $this->input->post('ids_categories_insert'),
			'movie_status' => $this->input->post('movie_status_insert'),
			'movie_quality' => $this->input->post('movie_quality_insert'),
			'movie_name' => $this->input->post('movie_name_insert'),
			'movie_slug' => $this->input->post('movie_slug_insert'),
			'movie_release_date' => $this->input->post('movie_release_date_insert'),
			'movie_duration' => $this->input->post('movie_duration_insert'),
			'movie_country_origin' => $this->input->post('movie_country_origin_insert'),
			'movie_cover' => $this->upload->data()['file_name'],
			'movie_description' => $this->input->post('movie_description_insert'),
			'movie_play' => $this->input->post('movie_play_insert')
		]);
	}

	public function view($id)
	{
		$movie = $this->Movie_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/movies.js')
			],
			'movie_id_encrypt' => $id,
			'movie' => $movie->row_array(),
			'productors_by_movie' => $this->Movie_model->productors_by_movie(['value' => $id, 'decrypt' => true]),
			'genders_by_movie' => $this->Movie_model->genders_by_movie(['value' => $id, 'decrypt' => true]),
			'categories_by_movie' => $this->Movie_model->categories_by_movie(['value' => $id, 'decrypt' => true]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$movie = $this->Movie_model->fetch(['value' => $id, 'decrypt' => true]);

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
				base_url('public/js/movies.js')
			],
			'movie_id_encrypt' => $id,
			'movie' => $movie->row_array(),
			'productors_by_movie' => $this->Movie_model->productors_by_movie(['value' => $id, 'decrypt' => true]),
			'genders_by_movie' => $this->Movie_model->genders_by_movie(['value' => $id, 'decrypt' => true]),
			'categories_by_movie' => $this->Movie_model->categories_by_movie(['value' => $id, 'decrypt' => true]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'qualities' => $this->Quality_model->index(['status' => 1]),
			'categories' => $this->Category_model->index(['status' => 1]),
			'genders' => $this->Gender_model->index(['status' => 1]),
			'productors' => $this->Productor_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update()
	{
		$data = [
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
			'movie_play' => $this->input->post('movie_play_update')
		];

		$config['upload_path'] = FOLDER_MOVIES;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('movie_cover_update')) {
			$cover = [
				'new_image_cover' => $this->upload->data()['file_name'],
				'old_image_cover' => NULL,
				'old_image_ext' => substr($this->input->post('image_cover_update_route'), -4)
			];
		} else {
			$cover = [
				'old_image_cover' => $this->input->post('image_cover_update_route'),
				'new_image_cover' => NULL
			];			
		}
		echo $this->Movie_model->update([...$data, ...$cover]);
	}

	public function edit_cover($id)
	{
		$movie = $this->Movie_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Películas',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/movies.js')
			],
			'movie_id_encrypt' => $id,
			'movie' => $movie->row_array(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/movies/cover');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_cover()
	{
		$config['upload_path'] = FOLDER_MOVIES;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('movie_cover_customize')) {
			echo 'not-upload';
		}

		echo $this->Movie_model->update_cover([
			'id_movie' => $this->input->post('id_movie_customize_cover'),
			'movie_cover' => $this->upload->data()['file_name'],
			'old_image_ext' => substr(trim($this->input->post('cover_update_route')), -4)
		]);
	}

	public function delete()
	{
		echo $this->Movie_model->delete(['id' => $this->input->post('id_movie_delete')]);
	}
}
