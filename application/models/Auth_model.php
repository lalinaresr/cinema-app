<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Session_model');
    }

    private function _send_email_($to, $subject, $message)
    {
        $this->load->library('email');

        $this->email->initialize([
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => GMAIL['EMAIL'],
            'smtp_pass' => GMAIL['PASSWORD'],
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ]);

        $this->email->from(GMAIL['EMAIL']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    private function _get_role_(int $role_id): string | null
    {
        return match ($role_id) {
            1 => 'is_admin',
            2 => 'is_user',
            3 => 'is_guest',
            default => NULL
        };
    }

    private function _set_userdata_(array $data = array()): void
    {
        $this->session->set_userdata($data);
    }

    public function login($data)
    {
        $response = $this->db->query(sprintf("SELECT id_user, id_contact, id_rol, id_status, user_username, user_email, user_password, user_avatar FROM cm_users WHERE user_email = '%s' AND id_status = 1 LIMIT 1", $data['email']));

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $user = $response->row_array();

        if (password_verify($data['password'], $user['user_password'])) {
            $this->_set_userdata_([
                'is_authorized' => true,
                'id_user' => $user['id_user'],
                'id_contact' => $user['id_contact'],
                'id_rol' => $user['id_rol'],
                $this->_get_role_($user['id_rol']) => true,
                'id_status' => $user['id_status'],
                'user_username' => $user['user_username']
            ]);

            $store = $this->Session_model->store($user['id_user']);
            return 'success';
        } else {
            return 'not-match';
        }
    }

    public function logout()
    {
        $this->_set_userdata_();
        $this->session->sess_destroy();

        return 'success';
    }
}
