<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productor_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array()): object
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

	public function store(array $data): string
	{
		$response = $this->db
			->select('id_productor')
			->where('productor_name', $data['name'])
			->limit(1)
			->get('cm_productors');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$store = $this->db->insert('cm_productors', [
			'id_status' => $data['status_id'],
			'productor_name' => $data['name'],
			'productor_slug' => url_title(remove_accents($data['name']), '-', true),
			'productor_image_logo' => 'NO-IMAGE',
			'ip_registered_pro' => get_current_ip(),
			'date_registered_pro' => get_current_date(),
			'client_registered_pro' => get_current_agent()
		]);

		return ($store ? 'success' : 'error');
	}

	public function fetch(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'id_productor, cm_productors.id_status, status_name, productor_name, productor_slug, productor_image_logo, ip_registered_pro, date_registered_pro, client_registered_pro, ip_modified_pro, date_modified_pro, client_modified_pro';
		$builder['search'] = $builder['search'] ?? 'id_productor';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) && $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

	public function update(array $data): string
	{
		$id = $data['id'];

		$response = $this->db
			->select('id_productor')
			->where('id_status', $data['status_id'])
			->where('productor_name', $data['name'])
			->limit(1)
			->get('cm_productors');


		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$update = $this->db
			->where('id_productor', $id)
			->update('cm_productors', [
				'id_status' => $data['status_id'],
				'productor_name' => $data['name'],
				'productor_slug' => url_title(remove_accents($data['name']), '-', true),
				'ip_modified_pro' => get_current_ip(),
				'date_modified_pro' => get_current_date(),
				'client_modified_pro' => get_current_agent()
			]);

		return ($update ? 'success' : 'error');
	}

	public function update_logo(array $data): string
	{
		$id = $data['id'];

		$response = $this->db
			->select('id_productor, productor_image_logo')
			->where('id_productor', $id)
			->limit(1)
			->get('cm_productors');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$productor = $response->row_array();

		$new_logo = FOLDER_PRODUCTORS . "/{$data['logo']}";
		$end_logo = FOLDER_PRODUCTORS . "/{$id}_logo.png";

		if (strcmp($productor['productor_image_logo'], 'NO-IMAGE') != 0) {
			unlink($productor['productor_image_logo']);
		}

		rename($new_logo, $end_logo);

		$update = $this->db
			->where('id_productor', $id)
			->update('cm_productors', [
				'productor_image_logo' => $end_logo
			]);

		return ($update ? 'success' : 'error');
	}

	public function delete(array $data): string
	{
		$id = $data['id'];

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

		if (!$fDelete || !$sDelete) {
			return 'error';
		}

		if (strcmp($productor['productor_image_logo'], 'NO-IMAGE') != 0) {
			unlink($productor['productor_image_logo']);
		}
		return 'success';
	}

	public function movies_by_productor(array $builder = array()): object
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
			$response = $response->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']));
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}
}
