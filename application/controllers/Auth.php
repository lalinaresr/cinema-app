<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');
	}

	public function index(): void
	{
		redirect(($this->session->userdata('is_authorized') ? 'dashboard' : 'auth/login'));
	}

	public function login(): void
	{
		if ($this->session->userdata('is_authorized')) {
			redirect('dashboard');
		}

		$params = [
			'title' => constant('APP_NAME') . ' - Iniciar sesión',
			'styles' => [
				base_url('public/css/auth.css')
			]
		];

		$this->load->view('header', $params);
		$this->load->view('partials/auth/login');
		$this->load->view('footer');
	}

	public function verify(): void
	{
		if ($this->session->userdata('is_authorized')) {
			redirect('dashboard');
		}

		echo $this->Auth_model->login([
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		]);
	}

	public function logout(): void
	{
		if ($this->session->userdata('is_authorized')) {
			if ($this->Auth_model->logout())
				echo site_url();
		}
	}
}
