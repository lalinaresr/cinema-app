<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sessions extends CI_Controller {

		/**
		* [__construct description]
		*/
		public function __construct(){
			parent::__construct(); 

			$this->load->model('Sessions_model');
			$this->load->model('Users_model');
		}

		/**
		* [index description]
		* @return [type] [description]
		*/
		public function index(){
			if (!$this->session->userdata('is_admin_logged_in')) {
				redirect(site_url());
			} else {
				$params = array(
					'title' => SITE_NAME . ' | Sesiones',
					'styles' => array(
						base_url('public/plugins/dataTables/css/dataTables.bootstrap.min.css'),
						'https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css',
						base_url('public/css/snipps/dashboard.css')
					),
					'scripts' => array(
						base_url('public/plugins/dataTables/js/jquery.dataTables.min.js'),
						base_url('public/plugins/dataTables/js/dataTables.bootstrap.min.js'),
						'https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js',
						'//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js',
						base_url('public/js/executes/dataTables.js')
					),
					'get_all_sessions' => $this->Sessions_model->get_all_sessions(),
					'user_avatar' => $this->Users_model->has_user_avatar($this->session->userdata('id_user'))
				);
				$this->load->view('header', $params);
				$this->load->view('layouts/dashboard/navbar');
				$this->load->view('layouts/dashboard/sidebar');
				$this->load->view('partials/sessions/container');
				$this->load->view('layouts/dashboard/footer');
				$this->load->view('footer');
			}		
		}
	}
?>
