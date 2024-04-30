<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(array $builder = array())
    {
        $builder['columns'] = $builder['columns'] ?? '*';
        $builder['order_column'] = $builder['order_column'] ?? 'id_newsletter';
        $builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
        $builder['start'] = $builder['start'] ?? 0;

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_newsletters')
            ->order_by($builder['order_column'], $builder['order_filter']);

        if (isset($builder['limit'])) {
            $response = $response->limit($builder['limit'], $builder['start']);
        }

        $response = $response->get();

        return $response;
    }
}
