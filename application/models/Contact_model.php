<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($data)
    {
        $response = $this->db->insert('cm_contacts', [
            'id_status' => $data['user_status'],
            'contact_firstname' => ucwords($data['contact_firstname']),
            'contact_lastname' => ucwords($data['contact_lastname']),
            'contact_sex' => $data['contact_sex'],
            'contact_date_birthday' => $data['contact_date_birthday'],
            'ip_registered_cnt' => get_ip_current(),
            'date_registered_cnt' => get_date_current(),
            'client_registered_cnt' => get_agent_current()
        ]);

        return $response;
    }

    public function update($data)
    {
        $response = $this->db
            ->where('id_contact', decryp($data['user_contact']))
            ->update('cm_contacts', [
                'id_status' => $data['user_status'],
                'contact_firstname' => ucwords($data['contact_firstname']),
                'contact_lastname' => ucwords($data['contact_lastname']),
                'contact_date_birthday' => $data['user_date_birthday'],
                'contact_sex' => $data['user_sex'],
                'ip_modified_cnt' => get_ip_current(),
                'date_modified_cnt' => get_date_current(),
                'client_modified_cnt' => get_agent_current()
            ]);

        return $response;
    }

    public function delete($data)
    {
        $response = $this->db
            ->where('id_contact', $data['contact_id'])
            ->delete('cm_contacts');

        return $response;
    }
}
