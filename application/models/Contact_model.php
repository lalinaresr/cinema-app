<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(array $data): bool | null
    {
        $response = $this->db->insert('cm_contacts', [
            'id_status' => $data['status_id'],
            'contact_firstname' => ucwords($data['firstname']),
            'contact_lastname' => ucwords($data['lastname']),
            'contact_sex' => $data['sex'],
            'contact_date_birthday' => $data['birthday'],
            'ip_registered_cnt' => get_current_ip(),
            'date_registered_cnt' => get_current_date(),
            'client_registered_cnt' => get_current_agent()
        ]);

        return $response;
    }

    public function update(array $data): bool | null
    {
        $response = $this->db
            ->where('id_contact', $data['contact_id'])
            ->update('cm_contacts', [
                'id_status' => $data['status_id'],
                'contact_firstname' => ucwords($data['firstname']),
                'contact_lastname' => ucwords($data['lastname']),
                'contact_date_birthday' => $data['birthday'],
                'contact_sex' => $data['sex'],
                'ip_modified_cnt' => get_current_ip(),
                'date_modified_cnt' => get_current_date(),
                'client_modified_cnt' => get_current_agent()
            ]);

        return $response;
    }

    public function destroy(array $data): bool | null
    {
        $response = $this->db
            ->where('id_contact', $data['contact_id'])
            ->delete('cm_contacts');

        return $response;
    }
}
