<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
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
			'Status_model',
		]);
	}

	public function index()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Categorías',
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
				base_url('public/js/categories.js')
			],
			'get_all_categories' => $this->Category_model->get_all_categories(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/categories/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Categorías',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/categories.js')
			],
			'get_all_status' => $this->Status_model->get_all_status(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/categories/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		$this->Category_model->store([
			'category_name' => $this->input->post('category_name_insert'),
			'category_slug' => $this->input->post('category_slug_insert'),
			'category_status' => $this->input->post('category_status_insert')
		]);
	}

	public function view($id)
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Categorías',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/categories.js')
			],
			'view_category' => $this->Category_model->get_category_by('id_category', $id),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/categories/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Categorías',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/categories.js')
			],
			'id_category_encryp' => $id,
			'edit_category' => $this->Category_model->get_category_by('id_category', $id),
			'get_all_status' => $this->Status_model->get_all_status(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/categories/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update()
	{
		$this->Category_model->update([
			'id_category' => $this->input->post('id_category_update'),
			'category_name' => $this->input->post('category_name_update'),
			'category_slug' => $this->input->post('category_slug_update'),
			'category_status' => $this->input->post('category_status_update')
		]);
	}

	public function delete()
	{
		$id = $this->input->post('id_category_delete');

		$this->Category_model->delete($id);
	}
}
