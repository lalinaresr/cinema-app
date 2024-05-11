<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qualities extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'User_model',
			'Quality_model',
			'Status_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
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
				['type' => 'module', 'src' => base_url('public/js/qualities.js')]
			],
			'qualities' => $this->Quality_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/qualities.js')]
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/create');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store(): void
	{
		echo $this->Quality_model->store([
			'status_id' => $this->input->post('status'),
			'name' => $this->input->post('name')
		]);
	}

	public function view(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/qualities.js')]
			],
			'quality' => $this->Quality_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/qualities.js')]
			],
			'quality' => $this->Quality_model->fetch(['value' => $id]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update(): void
	{
		echo $this->Quality_model->update([
			'id' => $this->input->post('quality'),
			'status_id' => $this->input->post('status'),
			'name' => $this->input->post('name')
		]);
	}

	public function delete(): void
	{
		echo $this->Quality_model->delete(['id' => $this->input->post('quality')]);
	}
}
