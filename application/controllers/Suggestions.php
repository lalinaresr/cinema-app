<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suggestions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'Suggestion_model',
			'User_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Sugerencias',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'suggestions' => $this->Suggestion_model->index(['status' => 1]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/suggestions/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}
}
