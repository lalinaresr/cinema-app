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

	public function index()
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
				base_url('public/js/qualities.js')
			],
			'qualities' => $this->Quality_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/qualities.js')
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		echo $this->Quality_model->store([
			'quality_name' => $this->input->post('quality_name_insert'),
			'quality_slug' => $this->input->post('quality_slug_insert'),
			'quality_status' => $this->input->post('quality_status_insert')
		]);
	}

	public function view($id)
	{
		$quality = $this->Quality_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/qualities.js')
			],
			'quality' => $quality->row_array(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/qualities/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$quality = $this->Quality_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Calidades',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/qualities.js')
			],
			'quality_id_encrypt' => $id,
			'quality' => $quality->row_array(),
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

	public function update()
	{
		echo $this->Quality_model->update([
			'id_quality' => $this->input->post('id_quality_update'),
			'quality_name' => $this->input->post('quality_name_update'),
			'quality_slug' => $this->input->post('quality_slug_update'),
			'quality_status' => $this->input->post('quality_status_update')
		]);
	}

	public function delete()
	{
		echo $this->Quality_model->delete(['id' => $this->input->post('id_quality_delete')]);
	}
}
