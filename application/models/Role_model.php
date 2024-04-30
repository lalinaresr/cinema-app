<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(array $builder = array())
    {
        $builder['select'] = $builder['select'] ?? 'id_rol, cm_roles.id_status, status_name, rol_name, rol_slug';
        $builder['order_column'] = $builder['order_column'] ?? 'id_rol';
        $builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
        $builder['start'] = $builder['start'] ?? 0;

        $response = $this->db
            ->select($builder['select'])
            ->from('cm_roles')
            ->join('cm_status', 'cm_status.id_status = cm_roles.id_status');

        if (isset($builder['status'])) {
            $response = $response->where('cm_roles.id_status', $builder['status']);
        }

        $response = $response->order_by($builder['order_column'], $builder['order_filter']);

        if (isset($builder['limit'])) {
            $response = $response->limit($builder['limit'], $builder['start']);
        }

        $response = $response->get();

        return $response;
    }
}
