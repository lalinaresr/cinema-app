<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public ?array $user;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->_get_user_();
    }

    private function _get_user_(): void
    {
        $this->user = $this->User_model->fetch(['value' => $this->session->userdata('id')])->row_array();
    }
}
