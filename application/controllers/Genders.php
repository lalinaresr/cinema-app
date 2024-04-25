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
			'Movie_model',
			'Productor_model',
			'Gender_model',
			'Category_model',
			'User_model',
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
			'get_all_genders' => $this->Gender_model->get_all_genders(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
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
			'get_all_status' => $this->Status_model->get_all_status(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
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
		$this->Gender_model->store([
			'gender_name' => $this->input->post('gender_name_insert'),
			'gender_slug' => $this->input->post('gender_slug_insert'),
			'gender_status' => $this->input->post('gender_status_insert')
		]);
	}

	public function view($id)
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/genders.js')
			],
			'view_gender' => $this->Gender_model->get_gender_by('id_gender', $id),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
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
		$params = [
			'title' => constant('APP_NAME') . ' | Géneros',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/genders.js')
			],
			'id_gender_encryp' => $id,
			'edit_gender' => $this->Gender_model->get_gender_by('id_gender', $id),
			'get_all_status' => $this->Status_model->get_all_status(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
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
		$this->Gender_model->update([
			'id_gender' => $this->input->post('id_gender_update'),
			'gender_name' => $this->input->post('gender_name_update'),
			'gender_slug' => $this->input->post('gender_slug_update'),
			'gender_status' => $this->input->post('gender_status_update')
		]);
	}

	public function delete()
	{
		$id = $this->input->post('id_gender_delete');

		$this->Gender_model->delete($id);
	}
}
