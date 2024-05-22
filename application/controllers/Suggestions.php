<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suggestions extends My_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model('Suggestion_model');
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Sugerencias',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'suggestions' => $this->Suggestion_model->index(['status' => 1])
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/suggestions/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}
}
