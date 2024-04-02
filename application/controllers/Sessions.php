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
					'page_title' => SITE_NAME . ' | Sesiones',
					'css_files' => array(
						base_url() . 'assets/css/bootstrap.min.css',
						base_url() . 'assets/css/font-awesome.min.css',
						base_url() . 'assets/plugins/dataTables/css/dataTables.bootstrap.min.css',
						'https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap.min.css',
						'https://fonts.googleapis.com/css?family=Ubuntu',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css', 
						base_url() . 'assets/css/snipps/dashboard.css',
						base_url() . 'assets/css/styles.css'
					),
					'js_files' => array(
						base_url() . 'assets/js/jquery-3.2.1.js',
						base_url() . 'assets/js/jquery.form.min.js',
						base_url() . 'assets/js/bootstrap.min.js',
						base_url() . 'assets/plugins/dataTables/js/jquery.dataTables.min.js',
						base_url() . 'assets/plugins/dataTables/js/dataTables.bootstrap.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js',
						'https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js',
						'//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js',
						'//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js',
						'//cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js',
						'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js',
						base_url() . 'assets/js/executes/dataTables.js',
						base_url() . 'assets/js/snipps/sessions.js',
						base_url() . 'assets/js/snipps/auth.js',
						base_url() . 'assets/js/site.js'
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
