<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sessions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized') && !$this->session->userdata('is_admin_logged_in')) {
			redirect();
		}

		$this->load->model([
			'Session_model',
			'User_model'
		]);
	}

	public function index()
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Sesiones',
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
				base_url('public/js/sessions.js')
			],
			'get_all_sessions' => $this->Session_model->get_all_sessions(),
			'user_avatar' => $this->User_model->has_user_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/sessions/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}
}
