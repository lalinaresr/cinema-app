<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'User_model',
			'Suggestion_model',
			'Newsletter_model',
			'Session_model'
		]);
	}

	public function index()
	{
		$params = [
			'title' => constant('APP_NAME'),
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'suggestions' => $this->Suggestion_model->index(['status' => 1, 'limit' => 5]),
			'newsletters' => $this->Newsletter_model->index(['limit' => 5]),
			'others_sessions' => $this->Session_model->index(['not' => 'cm_sessions.id_user', 'value' => $this->session->userdata('id_user'), 'limit' => 5]),
			'my_sessions' => $this->Session_model->index(['in' => 'cm_sessions.id_user', 'value' => $this->session->userdata('id_user'), 'limit' => 5]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/dashboard/container');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}
}
