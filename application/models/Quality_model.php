<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quality_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'cm_qualities.*, cm_status.status_name';
		$builder['order_column'] = $builder['order_column'] ?? 'id_quality';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status');

		if (isset($builder['status'])) {
			$response = $response->where('cm_qualities.id_status', $builder['status']);
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}

	public function store(array $data): string
	{
		$response = $this->db
			->select('id_quality')
			->where('quality_name', $data['name'])
			->limit(1)
			->get('cm_qualities');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$store = $this->db->insert('cm_qualities', [
			'id_status' => $data['status_id'],
			'quality_name' => $data['name'],
			'quality_slug' => url_title(remove_accents($data['name']), '-', true),
			'ip_registered_qlt' => get_current_ip(),
			'date_registered_qlt' => get_current_date(),
			'client_registered_qlt' => get_current_agent()
		]);

		return ($store ? 'success' : 'error');
	}

	public function fetch(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'cm_qualities.*, cm_status.status_name';
		$builder['search'] = $builder['search'] ?? 'id_quality';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

	public function update(array $data): string
	{
		$response = $this->db
			->select('id_quality')
			->where('id_status', $data['status_id'])
			->where('quality_name', $data['name'])
			->limit(1)
			->get('cm_qualities');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$update = $this->db
			->where('id_quality', $data['id'])
			->update('cm_qualities', [
				'id_status' => $data['status_id'],
				'quality_name' => $data['name'],
				'quality_slug' => url_title(remove_accents($data['name']), '-', true),
				'ip_modified_qlt' => get_current_ip(),
				'date_modified_qlt' => get_current_date(),
				'client_modified_qlt' => get_current_agent()
			]);

		return ($update ? 'success' : 'error');
	}

	public function delete(array $data): string
	{
		$id = $data['id'];

		$response = $this->db
			->select('id_quality')
			->where('id_quality', $id)
			->limit(1)
			->get('cm_qualities');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$delete = $this->db
			->where('id_quality', $id)
			->delete('cm_qualities');

		return ($delete ? 'success' : 'error');
	}
}
