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

    public function index(array $builder = array()): object
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

    public function store(array $data): string
    {
        $response = $this->db
            ->select('id_user')
            ->where('user_email', $data['email'])
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() > 0) {
            return 'existing';
        }

        $fStore = $this->Contact_model->store($data);
        $sStore = $this->db->insert('cm_users', [
            'id_contact' => $this->db->insert_id(),
            'id_rol' => $data['role_id'],
            'id_status' => $data['status_id'],
            'user_username' => ucwords($data['username']),
            'user_email' => $data['email'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'user_avatar' => 'NO-IMAGE',
            'ip_registered_usr' => get_current_ip(),
            'date_registered_usr' => get_current_date(),
            'client_registered_usr' => get_current_agent()
        ]);

        return (($fStore && $sStore) ? 'success' : 'error');
    }

    public function fetch(array $builder = array()): object
    {
        $builder['columns'] = $builder['columns'] ?? 'id_user, cm_users.id_contact, cm_users.id_rol, rol_name, cm_users.id_status, status_name, user_username, user_email, user_password, user_avatar, ip_registered_usr, date_registered_usr, client_registered_usr, ip_modified_usr, date_modified_usr, client_modified_usr, contact_firstname, contact_lastname, contact_sex, contact_date_birthday';
        $builder['search'] = $builder['search'] ?? 'cm_users.id_user';

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_users')
            ->join('cm_contacts', 'cm_contacts.id_contact = cm_users.id_contact')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
            ->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']))
            ->limit(1)
            ->get();

        return $response;
    }

    public function update(array $data): string
    {
        $response = $this->db
            ->select('id_user')
            ->where('id_rol', $data['role_id'])
            ->where('id_status', $data['status_id'])
            ->where('user_username', ucwords($data['username']))
            ->where('user_email', $data['email'])
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() > 0) {
            return 'existing';
        }

        $column = null;
        if (strlen($data['password']) > 0) {
            $column = ['user_password' => password_hash($data['password'], PASSWORD_DEFAULT)];
        }

        $fUpdate = $this->Contact_model->update($data);
        $sUpdate = $this->db
            ->where('id_user', $data['id'])
            ->update('cm_users', [
                'id_contact' => $data['contact_id'],
                'id_rol' => $data['role_id'],
                'id_status' => $data['status_id'],
                'user_username' => ucwords($data['username']),
                'user_email' => $data['email'],
                ...($column ? $column : []),
                'ip_modified_usr' => get_current_ip(),
                'date_modified_usr' => get_current_date(),
                'client_modified_usr' => get_current_agent()
            ]);

        return (($fUpdate && $sUpdate) ? 'success' : 'error');
    }

    public function update_avatar(array $data): string
    {
        $id = $data['id'];

        $response = $this->db
            ->select('user_avatar')
            ->where('id_user', $id)
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $user = $response->row_array();

        if (strcmp($user['user_avatar'], 'NO-IMAGE') != 0) {
            unlink($user['user_avatar']);
        }

        $new_avatar = FOLDER_AVATARS . "/{$data['avatar']}";
        $end_avatar = FOLDER_AVATARS . "/{$id}_avatar.png";

        rename($new_avatar, $end_avatar);

        $update = $this->db
            ->where('id_user', $id)
            ->update('cm_users', [
                'user_avatar' => $end_avatar
            ]);

        return ($update ? 'success' : 'error');
    }

    public function destroy(array $data): string
    {
        $id = $data['id'];

        $response = $this->db
            ->select('id_contact, user_avatar')
            ->where('id_user', $id)
            ->limit(1)
            ->get('cm_users');

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $user = $response->row_array();

        $fDelete = $this->Contact_model->destroy(['contact_id' => $user['id_contact']]);
        $sDelete = $this->Session_model->destroy(['user_id' => $id]);
        $tDelete = $this->db
            ->where('id_user', $id)
            ->delete('cm_users');

        if (!$fDelete || !$sDelete || !$tDelete) {
            return 'error';
        }

        if (strcmp($user['user_avatar'], 'NO-IMAGE') != 0) {
            unlink($user['user_avatar']);
        }
        return 'success';
    }
}
