<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(array $builder = array()): object
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

    public function fetch(array $builder = array()): object
    {
        $builder['columns'] = $builder['columns'] ?? '*';
        $builder['search'] = $builder['search'] ?? 'id_newsletter';

        $response = $this->db
            ->select($builder['columns'])
            ->from('cm_newsletters')
            ->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']))
            ->limit(1)
            ->get();

        return $response;
    }

    public function destroy(array $data): string
    {
        $id = $data['id'];

        $response = $this->db
            ->select('id_newsletter')
            ->where('id_newsletter', $id)
            ->limit(1)
            ->get('cm_newsletters');

        if ($response->num_rows() == 0) {
            return 'not-found';
        }

        $delete = $this->db
            ->where('id_newsletter', $id)
            ->delete('cm_newsletters');

        return ($delete ? 'success' : 'error');
    }
}
