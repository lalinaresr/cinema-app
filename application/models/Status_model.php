<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(array $builder = array()): object
    {
        $builder['select'] = $builder['select'] ?? 'id_status, status_name, status_slug';
        $builder['order_column'] = $builder['order_column'] ?? 'id_status';
        $builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
        $builder['start'] = $builder['start'] ?? 0;

        $response = $this->db
            ->select($builder['select'])
            ->from('cm_status')
            ->order_by($builder['order_column'], $builder['order_filter']);

        if (isset($builder['limit'])) {
            $response = $response->limit($builder['limit'], $builder['start']);
        }

        $response = $response->get();

        return $response;
    }
}
