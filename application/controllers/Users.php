<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized') && !$this->session->userdata('is_admin')) {
			redirect();
		}

		$this->load->model([
			'User_model',
			'Role_model',
			'Status_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
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
				['type' => 'module', 'src' => base_url('public/js/users.js')]
			],
			'users' => $this->User_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/libs/moment.js'),
				base_url('public/js/libs/moment-with-locales.js'),
				base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
				['type' => 'module', 'src' => base_url('public/js/users.js')]
			],
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'roles' => $this->Role_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/create');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store(): void
	{
		echo $this->User_model->store([
			'role_id' => $this->input->post('role'),
			'status_id' => $this->input->post('status'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'sex' => $this->input->post('sex'),
			'birthday' => $this->input->post('birthday')
		]);
	}

	public function show(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/users.js')]
			],
			'user' => $this->User_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/show');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/libs/bootstrap-datetimepicker.min.css'),
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/libs/moment.js'),
				base_url('public/js/libs/moment-with-locales.js'),
				base_url('public/js/libs/bootstrap-datetimepicker.min.js'),
				['type' => 'module', 'src' => base_url('public/js/users.js')]
			],
			'user' => $this->User_model->fetch(['value' => $id]),
			'status' => $this->Status_model->index(['order_filter' => 'ASC']),
			'roles' => $this->Role_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update(int $id): void
	{
		echo $this->User_model->update([
			'id' => $id,
			'contact_id' => $this->input->input_stream('contact'),
			'role_id' => $this->input->input_stream('role'),
			'status_id' => $this->input->input_stream('status'),
			'firstname' => $this->input->input_stream('firstname'),
			'lastname' => $this->input->input_stream('lastname'),
			'username' => $this->input->input_stream('username'),
			'email' => $this->input->input_stream('email'),
			'password' => $this->input->input_stream('password'),
			'sex' => $this->input->input_stream('sex'),
			'birthday' => $this->input->input_stream('birthday')
		]);
	}

	public function edit_avatar(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				['type' => 'module', 'src' => base_url('public/js/users.js')]
			],
			'user' => $this->User_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/avatar');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_avatar(int $id): void
	{
		$config['upload_path'] = FOLDER_AVATARS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('avatar')) {
			echo 'not-upload';
		}

		$data = $this->upload->data();

		echo $this->User_model->update_avatar([
			'id' => $id,
			'avatar' => $data['file_name']
		]);
	}

	public function destroy(int $id): void
	{
		echo $this->User_model->destroy(compact('id'));
	}
}
