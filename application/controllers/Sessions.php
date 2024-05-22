<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sessions extends My_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized') || !$this->session->userdata('is_admin')) {
			redirect();
		}

		$this->load->model('Session_model');
	}

	public function index(): void
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
			'sessions' => $this->Session_model->index()
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/sessions/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function show(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Sesiones',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/sessions.js')
			],
			'session' => $this->Session_model->fetch(['value' => $id])
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/sessions/show');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}
}
