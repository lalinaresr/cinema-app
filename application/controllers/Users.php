<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized') && !$this->session->userdata('is_admin_logged_in')) {
			redirect();
		}

		$this->load->model([
			'User_model',
			'Role_model',
			'Status_model'
		]);
	}

	public function index()
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
				base_url('public/js/users.js')
			],
			'get_all_users' => $this->User_model->get_all_users(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function create()
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
				base_url('public/js/users.js')
			],
			'get_all_status' => $this->Status_model->get_all_status(),
			'get_all_roles_activated' => $this->Role_model->get_all_roles_activated(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/add');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function store()
	{
		$this->User_model->store([
			'contact_firstname' => $this->input->post('user_firstname_insert'),
			'contact_lastname' => $this->input->post('user_lastname_insert'),
			'contact_sex' => $this->input->post('user_sex_insert'),
			'contact_date_birthday' => $this->input->post('user_date_birthday_insert'),
			'user_rol' => $this->input->post('user_rol_insert'),
			'user_status' => $this->input->post('user_status_insert'),
			'user_username' => $this->input->post('user_username_insert'),
			'user_email' => $this->input->post('user_email_insert'),
			'user_password' => ''
		]);
	}

	public function view($id)
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/users.js')
			],
			'id_user_encryp' => $id,
			'view_user' => $this->User_model->get_user_by('id_user', $id),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function edit($id)
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
				base_url('public/js/users.js')
			],
			'id_user_encryp' => $id,
			'edit_user' => $this->User_model->get_user_by('id_user', $id),
			'get_all_status' => $this->Status_model->get_all_status(),
			'get_all_roles_activated' => $this->Role_model->get_all_roles_activated(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/edit');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update()
	{
		$this->User_model->update([
			'id_user' => $this->input->post('id_user_update'),
			'user_contact' => $this->input->post('id_contact_update'),
			'user_firstname' => $this->input->post('user_firstname_update'),
			'user_lastname' => $this->input->post('user_lastname_update'),
			'user_sex' => $this->input->post('user_sex_update'),
			'user_date_birthday' => $this->input->post('user_date_birthday_update'),
			'user_rol' => $this->input->post('user_rol_update'),
			'user_status' => $this->input->post('user_status_update'),
			'user_username' => $this->input->post('user_username_update'),
			'user_email' => $this->input->post('user_email_update'),
			'user_password' => ''
		]);
	}

	public function edit_avatar($id)
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Usuarios',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/users.js')
			],
			'id_user_encryp' => $id,
			'view_user' => $this->User_model->get_user_by('id_user', $id),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/users/avatar');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function update_avatar()
	{
		$config['upload_path'] = FOLDER_AVATARS;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('user_avatar_customize')) {
			$this->User_model->update_avatar([
				'id_user' => $this->input->post('id_user_customize_avatar'),
				'user_avatar' => $this->upload->data()['file_name'],
				'old_image_ext' => substr($this->input->post('image_avatar_update_route'), -4)
			]);
		} else {
			echo 'not-upload';
		}
	}

	public function delete()
	{
		$id = $this->input->post('id_user_delete');

		$this->User_model->delete($id);
	}
}
