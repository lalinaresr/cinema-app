<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productors extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'User_model',
			'Movie_model',
			'Productor_model',
			'Gender_model',
			'Category_model',
			'Status_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
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
				['type' => 'module', 'src' => base_url('public/js/productors.js')]
			],
			'productors' => $this->Productor_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/productors.js')]
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/create');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store(): void
	{
		echo $this->Productor_model->store([
			'status_id' => $this->input->post('status'),
			'name' => $this->input->post('name')
		]);
	}

	public function view(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/productors.js')]
			],
			'productor' => $this->Productor_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/productors.js')]
			],
			'productor' => $this->Productor_model->fetch(['value' => $id]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update(): void
	{
		echo $this->Productor_model->update([
			'id' => $this->input->post('productor'),
			'status_id' => $this->input->post('status'),
			'name' => $this->input->post('name')
		]);
	}

	public function edit_logo(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/productors.js')]
			],
			'productor' => $this->Productor_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/logo');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_logo(): void
	{
		$config['upload_path'] = FOLDER_PRODUCTORS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('logo')) {
			echo 'not-upload';
		}

		$data = $this->upload->data();

		echo $this->Productor_model->update_logo([
			'id' => $this->input->post('productor'),
			'logo' => $data['file_name']
		]);
	}

	public function delete(): void
	{
		echo $this->Productor_model->delete(['id' => $this->input->post('productor')]);
	}
}
