<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productor_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'id_productor, cm_productors.id_status, status_name, productor_name, productor_slug, productor_image_logo, ip_registered_pro, date_registered_pro, client_registered_pro, ip_modified_pro, date_modified_pro, client_modified_pro';
		$builder['order_column'] = $builder['order_column'] ?? 'id_productor';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status');

		if (isset($builder['status'])) {
			$response = $response->where('cm_productors.id_status', $builder['status']);
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}

	public function store($data)
	{
		$original_logo = FOLDER_PRODUCTORS . "/{$data['productor_image_logo']}";

		$response = $this->db
			->where('productor_name', $data['productor_name'])
			->get('cm_productors');

		if ($response->num_rows() > 0) {
			unlink($original_logo);
			return 'existing';
		}

		$store = $this->db->insert('cm_productors', [
			'id_status' => $data['productor_status'],
			'productor_name' => $data['productor_name'],
			'productor_slug' => url_title($data['productor_name'], '-', true),
			'productor_image_logo' => $original_logo,
			'ip_registered_pro' => get_ip_current(),
			'date_registered_pro' => get_date_current(),
			'client_registered_pro' => get_agent_current()
		]);

		$last_id = $this->db->insert_id();

		$new_logo = FOLDER_PRODUCTORS . "/{$last_id}_logo" . substr($data['productor_image_logo'], -4);

		rename($original_logo, $new_logo);

		$update = $this->db
			->where('id_productor', $last_id)
			->update('cm_productors', [
				'productor_image_logo' => $new_logo
			]);

		return ($store && $update ? 'success' : 'error');
	}

	public function fetch(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'id_productor, cm_productors.id_status, status_name, productor_name, productor_slug, productor_image_logo, ip_registered_pro, date_registered_pro, client_registered_pro, ip_modified_pro, date_modified_pro, client_modified_pro';
		$builder['search'] = $builder['search'] ?? 'id_productor';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) && $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

	public function update($data)
	{
		$id = decryp($data['id_productor']);

		$end_logo = '';
		$new_logo = FOLDER_PRODUCTORS . "/{$data['new_image_logo']}";

		$response = $this->db
			->select('id_productor')
			->where('id_status', $data['productor_status'])
			->where('productor_name', $data['productor_name'])
			->limit(1)
			->get('cm_productors');

		if ($response->num_rows() > 0) {
			if ($data['new_image_logo'] != NULL && $data['old_image_logo'] == NULL) {
				unlink($new_logo);
			}
			return 'existing';
		}

		if ($data['old_image_logo'] != NULL && $data['new_image_logo'] == NULL) {
			$end_logo = $data['old_image_logo'];
		}

		if ($data['new_image_logo'] != NULL && $data['old_image_logo'] == NULL) {
			unlink(FOLDER_PRODUCTORS . "/{$id}_logo" . substr(strtolower($data['old_image_ext']), -4));
			$end_logo = FOLDER_PRODUCTORS . "/{$id}_logo" . substr(strtolower($data['new_image_logo']), -4);
			rename($new_logo, $end_logo);
		}

		$update = $this->db
			->where('id_productor', $id)
			->update('cm_productors', [
				'productor_name' => $data['productor_name'],
				'productor_slug' => url_title($data['productor_name'], '-', true),
				'productor_image_logo' => $end_logo,
				'id_status' => $data['productor_status'],
				'ip_modified_pro' => get_ip_current(),
				'date_modified_pro' => get_date_current(),
				'client_modified_pro' => get_agent_current()
			]);

		return ($update ? 'success' : 'error');
	}

	public function update_logo($data)
	{
		$id = decryp($data['id_productor']);

		$response = $this->db
			->select('id_productor, productor_image_logo')
			->where('id_productor', $id)
			->limit(1)
			->get('cm_productors');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$productor = $response->row_array();

		$old = FOLDER_PRODUCTORS . "/{$data['productor_image_logo']}";
		$new = FOLDER_PRODUCTORS . "/{$id}_logo" . substr(strtolower($data['productor_image_logo']), -4);

		if (strcmp($productor['productor_image_logo'], 'NO-IMAGE') != 0) {
			unlink($productor['productor_image_logo']);
		}

		rename($old, $new);

		$update = $this->db
			->where('id_productor', $id)
			->update('cm_productors', [
				'productor_image_logo' => $new
			]);

		return ($update ? 'success' : 'error');
	}

	public function delete($data)
	{
		$id = decryp($data['id']);

		$response = $this->db
			->select('id_productor, productor_image_logo')
			->where('id_productor', $id)
			->limit(1)
			->get('cm_productors');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$productor = $response->row_array();

		$fDelete = $this->db
			->where('id_productor', $id)
			->delete('cm_productors');

		$sDelete = $this->db
			->where('id_productor', $id)
			->delete('cm_pro_mov');

		if ($fDelete != FALSE && $sDelete != FALSE) {
			if (strcmp($productor['productor_image_logo'], 'NO-IMAGE') != 0) {
				unlink($productor['productor_image_logo']);
			}
			return 'success';
		} else {
			return 'error';
		}
	}

	public function movies_by_productor(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'cm_movies.id_movie, cm_movies.id_status, id_quality, productor_name, productor_slug, productor_image_logo, movie_name, movie_slug, movie_description, movie_release_date, movie_duration, movie_country_origin, movie_cover, movie_reproductions, movie_play, is_premiere';
		$builder['order_column'] = $builder['order_column'] ?? 'cm_movies.id_movie';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_pro_mov')
			->join('cm_productors', 'cm_productors.id_productor = cm_pro_mov.id_productor')
			->join('cm_movies', 'cm_movies.id_movie = cm_pro_mov.id_movie');

		if (isset($builder['status'])) {
			$response = $response
				->where('cm_productors.id_status', $builder['status'])
				->where('cm_movies.id_status', $builder['status']);
		}

		if (isset($builder['search']) && isset($builder['value'])) {
			$response = $response->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']));
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}
}
