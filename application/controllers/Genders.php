<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genders extends CI_Controller
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

	public function index()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
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
				base_url('public/js/genders.js')
			],
			'genders' => $this->Gender_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/genders/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/genders.js')
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/genders/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		echo $this->Gender_model->store([
			'gender_name' => $this->input->post('gender_name_insert'),
			'gender_slug' => $this->input->post('gender_slug_insert'),
			'gender_status' => $this->input->post('gender_status_insert')
		]);
	}

	public function view($id)
	{
		$gender = $this->Gender_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/genders.js')
			],
			'gender' => $gender->row_array(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/genders/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$gender = $this->Gender_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/genders.js')
			],
			'gender_id_encrypt' => $id,
			'gender' => $gender->row_array(),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/genders/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update()
	{
		echo $this->Gender_model->update([
			'id_gender' => $this->input->post('id_gender_update'),
			'gender_name' => $this->input->post('gender_name_update'),
			'gender_slug' => $this->input->post('gender_slug_update'),
			'gender_status' => $this->input->post('gender_status_update')
		]);
	}

	public function delete()
	{
		echo $this->Gender_model->delete(['id' => $this->input->post('id_gender_delete')]);
	}
}
