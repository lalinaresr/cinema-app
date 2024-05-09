<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletters extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('is_authorized')) {
			redirect();
		}

		$this->load->model([
			'Newsletter_model',
			'User_model'
		]);
	}

	public function index(): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Seguidores',
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
				base_url('public/js/newsletters.js')
			],
			'newsletters' => $this->Newsletter_model->index(),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/newsletters/index');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function view(int $id): void
	{
		$params = [
			'title' => constant('APP_NAME') . ' | Seguidores',
			'styles' => [
				base_url('public/css/dashboard.css')
			],
			'scripts' => [
				base_url('public/js/newsletters.js')
			],
			'newsletter' => $this->Newsletter_model->fetch(['value' => $id]),
			'avatar' => $this->User_model->get_avatar($this->session->userdata('id_user'))
		];

		$this->load->view('header', $params);
		$this->load->view('layouts/dashboard/navbar');
		$this->load->view('layouts/dashboard/sidebar');
		$this->load->view('partials/newsletters/view');
		$this->load->view('layouts/dashboard/footer');
		$this->load->view('footer');
	}

	public function delete(): void
	{
		echo $this->Newsletter_model->delete(['id' => $this->input->post('newsletter')]);
	}
}
