<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suggestion_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'id_suggestion, cm_suggestions.id_status, status_name, suggestion_name, suggestion_email, suggestion_description, suggestion_key, ip_registered_sug, date_registered_sug, client_registered_sug';
		$builder['order_column'] = $builder['order_column'] ?? 'id_suggestion';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_suggestions')
			->join('cm_status', 'cm_status.id_status = cm_suggestions.id_status');

		if (isset($builder['status'])) {
			$response = $response->where('cm_suggestions.id_status', $builder['status']);
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}
}
