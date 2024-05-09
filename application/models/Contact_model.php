<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(array $data): string
    {
        $response = $this->db->insert('cm_contacts', [
            'id_status' => $data['status_id'],
            'contact_firstname' => ucwords($data['firstname']),
            'contact_lastname' => ucwords($data['lastname']),
            'contact_sex' => $data['sex'],
            'contact_date_birthday' => $data['birthday'],
            'ip_registered_cnt' => get_ip_current(),
            'date_registered_cnt' => get_date_current(),
            'client_registered_cnt' => get_agent_current()
        ]);

        return $response;
    }

    public function update(array $data): string
    {
        $response = $this->db
            ->where('id_contact', $data['contact_id'])
            ->update('cm_contacts', [
                'id_status' => $data['status_id'],
                'contact_firstname' => ucwords($data['firstname']),
                'contact_lastname' => ucwords($data['lastname']),
                'contact_date_birthday' => $data['birthday'],
                'contact_sex' => $data['sex'],
                'ip_modified_cnt' => get_ip_current(),
                'date_modified_cnt' => get_date_current(),
                'client_modified_cnt' => get_agent_current()
            ]);

        return $response;
    }

    public function delete(array $data): string
    {
        $response = $this->db
            ->where('id_contact', $data['contact_id'])
            ->delete('cm_contacts');

        return $response;
    }
}
