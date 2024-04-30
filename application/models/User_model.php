<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'Contact_model',
            'Session_model'
        ]);
    }

    public function index(array $builder = array())
    {
        $builder['columns'] = $builder['columns'] ?? 'id_user, cm_users.id_contact, cm_users.id_rol, rol_name, cm_users.id_status, status_name, user_username, user_email, user_password, user_avatar, ip_registered_usr, date_registered_usr, client_registered_usr, ip_modified_usr, date_modified_usr, client_modified_usr, contact_firstname, contact_lastname, contact_sex, contact_date_birthday';
        $builder['order_column'] = $builder['order_column'] ?? 'cm_users.id_user';
        $builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
        $builder['start'] = $builder['start'] ?? 0;

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_users')
            ->join('cm_contacts', 'cm_contacts.id_contact = cm_users.id_contact')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
            ->order_by($builder['order_column'], $builder['order_filter']);

        if (isset($builder['limit'])) {
            $response = $response->limit($builder['limit'], $builder['start']);
        }

        $response = $response->get();

        return $response;
    }

    public function store($data)
    {
        $response = $this->db
            ->select('id_user')
            ->where('user_email', $data['user_email'])
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() > 0) {
            return 'existing';
        }

        $fStore = $this->Contact_model->store($data);
        $sStore = $this->db->insert('cm_users', [
            'id_contact' => $this->db->insert_id(),
            'id_rol' => $data['user_rol'],
            'id_status' => $data['user_status'],
            'user_username' => ucwords($data['user_username']),
            'user_email' => $data['user_email'],
            'user_password' => password_hash($data['user_password'], PASSWORD_DEFAULT),
            'user_avatar' => 'NO-IMAGE',
            'ip_registered_usr' => get_ip_current(),
            'date_registered_usr' => get_date_current(),
            'client_registered_usr' => get_agent_current()
        ]);

        return (($fStore && $sStore) ? 'success' : 'error');
    }

    public function fetch(array $builder = array())
    {
        $builder['columns'] = $builder['columns'] ?? 'id_user, cm_users.id_contact, cm_users.id_rol, rol_name, cm_users.id_status, status_name, user_username, user_email, user_password, user_avatar, ip_registered_usr, date_registered_usr, client_registered_usr, ip_modified_usr, date_modified_usr, client_modified_usr, contact_firstname, contact_lastname, contact_sex, contact_date_birthday';
        $builder['search'] = $builder['search'] ?? 'cm_users.id_user';

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_users')
            ->join('cm_contacts', 'cm_contacts.id_contact = cm_users.id_contact')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
            ->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']))
            ->limit(1)
            ->get();

        return $response;
    }

    public function update($data)
    {
        $response = $this->db
            ->select('id_user')
            ->where('id_rol', $data['user_rol'])
            ->where('id_status', $data['user_status'])
            ->where('user_username', ucwords($data['user_username']))
            ->where('user_email', $data['user_email'])
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() > 0) {
            return 'existing';
        }

        $fUpdate = $this->Contact_model->update($data);
        $sUpdate = $this->db
            ->where('id_user', decryp($data['id_user']))
            ->update('cm_users', [
                'id_contact' => decryp($data['user_contact']),
                'id_rol' => $data['user_rol'],
                'id_status' => $data['user_status'],
                'user_username' => ucwords($data['user_username']),
                'user_email' => $data['user_email'],
                'user_password' => password_hash($data['user_password'], PASSWORD_DEFAULT),
                'ip_modified_usr' => get_ip_current(),
                'date_modified_usr' => get_date_current(),
                'client_modified_usr' => get_agent_current()
            ]);

        return (($fUpdate && $sUpdate) ? 'success' : 'error');
    }

    public function get_avatar($user_id)
    {
        $response = $this->db
            ->where('id_user', $user_id)
            ->get('cm_users');

        $user = $response->row_array();

        return ($response->num_rows() > 0 ? base_url(($user['user_avatar'] != 'NO-IMAGE' ? $user['user_avatar'] : FOLDER_AVATARS . '/default.png')) : 'NO-IMAGE');
    }

    public function update_avatar($data)
    {
        $id = decryp($data['id_user']);

        $response = $this->db
            ->where('id_user', $id)
            ->get('cm_users');

        $old_avatar = FOLDER_AVATARS . "/{$data['avatar']}";
        $new_avatar = FOLDER_AVATARS . "/{$id}_avatar.png";

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $user = $response->row_array();

        if (strcmp($user['user_avatar'], 'NO-IMAGE') != 0) {
            unlink($user['user_avatar']);
        }

        rename($old_avatar, $new_avatar);

        $update = $this->db
            ->where('id_user', $id)
            ->update('cm_users', [
                'user_avatar' => $new_avatar
            ]);

        return ($update ? 'success' : 'error');
    }

    public function delete($data)
    {
        $id = decryp($data['id']);

        $response = $this->db
            ->select('id_contact, user_avatar')
            ->where('id_user', $id)
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $user = $response->row_array();

        $fDelete = $this->Contact_model->delete(['contact_id' => $user['id_contact']]);
        $sDelete = $this->Session_model->delete(['user_id' => $id]);
        $tDelete = $this->db
            ->where('id_user', $id)
            ->delete('cm_users');

        if ($fDelete && $sDelete && $tDelete) {
            if (strcmp($user['user_avatar'], 'NO-IMAGE') != 0) {
                unlink($user['user_avatar']);
            }
            return 'success';
        } else {
            return 'error';
        }
    }
}
