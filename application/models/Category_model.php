<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'id_category, cm_categories.id_status, status_name, category_name, category_slug, ip_registered_cat, date_registered_cat, client_registered_cat, ip_modified_cat, date_modified_cat, client_modified_cat';
		$builder['order_column'] = $builder['order_column'] ?? 'id_category';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status');

		if (isset($builder['status'])) {
			$response = $response->where('cm_categories.id_status', $builder['status']);
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
		$response = $this->db
			->where('category_name', $data['category_name'])
			->get('cm_categories');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$store = $this->db->insert('cm_categories', [
			'id_status' => $data['category_status'],
			'category_name' => $data['category_name'],
			'category_slug' => url_title($data['category_name'], '-', true),
			'ip_registered_cat' => get_ip_current(),
			'date_registered_cat' => get_date_current(),
			'client_registered_cat' => get_agent_current()
		]);

		return ($store ? 'success' : 'error');
	}

	public function fetch(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'id_category, cm_categories.id_status, status_name, category_name, category_slug, ip_registered_cat, date_registered_cat, client_registered_cat, ip_modified_cat, date_modified_cat, client_modified_cat';
		$builder['search'] = $builder['search'] ?? 'id_category';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

	public function update($data)
	{
		$response = $this->db
			->where('id_status', $data['category_status'])
			->where('category_name', $data['category_name'])
			->get('cm_categories');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$update = $this->db
			->where('id_category', decryp($data['id_category']))
			->update('cm_categories', [
				'id_status' => $data['category_status'],
				'category_name' => $data['category_name'],
				'category_slug' => url_title($data['category_name'], '-', true),
				'ip_modified_cat' => get_ip_current(),
				'date_modified_cat' => get_date_current(),
				'client_modified_cat' => get_agent_current()
			]);

		return ($update ? 'success' : 'error');
	}

	public function delete($data)
	{
		$id = decryp($data['id']);

		$response = $this->db
			->select('id_category')
			->where('id_category', $id)
			->limit(1)
			->get('cm_categories');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$fDelete = $this->db
			->where('id_category', $id)
			->delete('cm_categories');

		$sDelete = $this->db
			->where('id_category', $id)
			->delete('cm_cat_mov');

		return (($fDelete && $sDelete) ? 'success' : 'error');
	}

	public function movies_by_category(array $builder = array())
	{
		$builder['columns'] = $builder['columns'] ?? 'cm_movies.id_movie, cm_movies.id_status, cm_movies.id_quality, cm_categories.id_category, cm_categories.category_name, cm_categories.category_slug, cm_movies.movie_name, cm_movies.movie_slug, cm_movies.movie_description, cm_movies.movie_release_date, cm_movies.movie_duration, cm_movies.movie_country_origin, cm_movies.movie_cover, cm_movies.movie_reproductions, cm_movies.movie_play, cm_movies.is_premiere';
		$builder['order_column'] = $builder['order_column'] ?? 'cm_movies.id_movie';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_cat_mov')
			->join('cm_categories', 'cm_categories.id_category = cm_cat_mov.id_category')
			->join('cm_movies', 'cm_movies.id_movie = cm_cat_mov.id_movie');

		if (isset($builder['status'])) {
			$response = $response
				->where('cm_categories.id_status', $builder['status'])
				->where('cm_movies.id_status', $builder['status']);
		}

		if (isset($builder['search']) && isset($builder['value'])) {
			$response = $response
				->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decryp($builder['value']) : $builder['value']));
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}
}
