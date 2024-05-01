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

	public function index()
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
				base_url('public/js/productors.js')
			],
			'productors' => $this->Productor_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/productors.js')
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		$config['upload_path'] = FOLDER_PRODUCTORS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('productor_image_logo_insert')) {
			echo 'not-upload';
		}

		echo $this->Productor_model->store([
			'productor_name' => $this->input->post('productor_name_insert'),
			'productor_slug' => $this->input->post('productor_slug_insert'),
			'productor_status' => $this->input->post('productor_status_insert'),
			'productor_image_logo' => $this->upload->data()['file_name']
		]);
	}

	public function view($id)
	{
		$productor = $this->Productor_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/productors.js')
			],
			'productor_id_encrypt' => $id,
			'productor' => $productor->row_array(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
	{
		$productor = $this->Productor_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/productors.js')
			],
			'productor_id_encrypt' => $id,
			'productor' => $productor->row_array(),
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

	public function update()
	{
		$data = [
			'id_productor' => $this->input->post('id_productor_update'),
			'productor_name' => $this->input->post('productor_name_update'),
			'productor_slug' => $this->input->post('productor_slug_update'),
			'productor_status' => $this->input->post('productor_status_update')
		];

		$config['upload_path'] = FOLDER_PRODUCTORS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('productor_image_logo_update')) {
			$logo = [
				'old_image_logo' => NULL,
				'old_image_ext' => substr($this->input->post('image_logo_update_route'), -4),
				'new_image_logo' => $this->upload->data()['file_name']
			];
		} else {
			$logo = [
				'old_image_logo' => $this->input->post('image_logo_update_route'),
				'new_image_logo' => NULL
			];
		}
		echo $this->Productor_model->update([...$data, ...$logo]);
	}

	public function edit_logo($id)
	{
		$productor = $this->Productor_model->fetch(['value' => $id, 'decrypt' => true]);

		$params = [
			'title' => constant('APP_NAME') . ' | Productores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/productors.js')
			],
			'productor_id_encrypt' => $id,
			'productor' => $productor->row_array(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/productors/logo');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_logo()
	{
		$config['upload_path'] = FOLDER_PRODUCTORS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('productor_image_logo_customize')) {
			echo 'not-upload';
		}

		echo $this->Productor_model->update_logo([
			'id_productor' => $this->input->post('id_productor_customize_logo'),
			'productor_image_logo' => $this->upload->data()['file_name'],
			'old_image_ext' => substr($this->input->post('image_logo_update_route'), -4)
		]);
	}

	public function delete()
	{
		echo $this->Productor_model->delete(['id' => $this->input->post('id_productor_delete')]);
	}
}
