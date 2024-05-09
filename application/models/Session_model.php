<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Session_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(array $builder = array()): object
    {
        $builder['columns'] = $builder['columns'] ?? 'id_session, cm_sessions.id_user, id_contact, cm_users.id_rol, rol_name, cm_users.id_status, status_name, user_username, user_avatar, session_browser_used, session_os_used, session_browser_version, ip_registered_ses, date_registered_ses, client_registered_ses';
        $builder['order_column'] = $builder['order_column'] ?? 'id_session';
        $builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
        $builder['start'] = $builder['start'] ?? 0;

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_sessions')
            ->join('cm_users', 'cm_users.id_user = cm_sessions.id_user')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status');

        if (isset($builder['not']) && isset($builder['value'])) {
            $response = $response
                ->where_not_in($builder['not'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']));
        }

        if (isset($builder['in']) && isset($builder['value'])) {
            $response = $response
                ->where($builder['in'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']));
        }

        $response = $response
            ->order_by($builder['order_column'], $builder['order_filter']);

        if (isset($builder['limit'])) {
            $response = $response->limit($builder['limit'], $builder['start']);
        }

        $response = $response->get();

        return $response;
    }

    public function store($user_id)
    {
        $response = $this->db->insert('cm_sessions', [
            'id_user' => $user_id,
            'session_browser_used' => ucfirst(strtolower(detect_client()['browsers'])),
            'session_os_used' => ucfirst(strtolower(detect_client()['os'])),
            'session_browser_version' => detect_client()['version'],
            'ip_registered_ses' => get_ip_current(),
            'date_registered_ses' => get_date_current(),
            'client_registered_ses' => get_agent_current()
        ]);

        return $response;
    }

    public function fetch(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'id_session, cm_sessions.id_user, id_contact, cm_users.id_rol, rol_name, cm_users.id_status, status_name, user_username, user_avatar, session_browser_used, session_os_used, session_browser_version, ip_registered_ses, date_registered_ses, client_registered_ses';
		$builder['search'] = $builder['search'] ?? 'id_session';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_sessions')
            ->join('cm_users', 'cm_users.id_user = cm_sessions.id_user')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

    public function delete(array $data): string
    {
        $response = $this->db
            ->where('id_user', $data['user_id'])
            ->delete('cm_sessions');

        return $response;
    }
}
