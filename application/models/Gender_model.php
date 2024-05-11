<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gender_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'id_gender, cm_genders.id_status, status_name, gender_name, gender_slug, ip_registered_gds, date_registered_gds, client_registered_gds, ip_modified_gds, date_modified_gds, client_modified_gds';
		$builder['order_column'] = $builder['order_column'] ?? 'id_gender';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status');

		if (isset($builder['status'])) {
			$response = $response->where('cm_genders.id_status', $builder['status']);
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
			->where('gender_name', $data['name'])
			->get('cm_genders');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$store = $this->db->insert('cm_genders', [
			'id_status' => $data['status_id'],
			'gender_name' => $data['name'],
			'gender_slug' => url_title(remove_accents($data['name']), '-', true),
			'ip_registered_gds' => get_current_ip(),
			'date_registered_gds' => get_current_date(),
			'client_registered_gds' => get_current_agent()
		]);

		return ($store ? 'success' : 'error');
	}

	public function fetch(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'id_gender, cm_genders.id_status, status_name, gender_name, gender_slug, ip_registered_gds, date_registered_gds, client_registered_gds, ip_modified_gds, date_modified_gds, client_modified_gds';
		$builder['search'] = $builder['search'] ?? 'id_gender';

		$response = $this->db
			->select($builder['columns'])
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status')
			->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']))
			->limit(1)
			->get();

		return $response;
	}

	public function update(array $data): string
	{
		$response = $this->db
			->select('id_gender')
			->where('id_status', $data['status_id'])
			->where('gender_name', $data['name'])
			->limit(1)
			->get('cm_genders');

		if ($response->num_rows() > 0) {
			return 'existing';
		}

		$update = $this->db
			->where('id_gender', $data['id'])
			->update('cm_genders', [
				'id_status' => $data['status_id'],
				'gender_name' => $data['name'],
				'gender_slug' => url_title(remove_accents($data['name']), '-', true),
				'ip_modified_gds' => get_current_ip(),
				'date_modified_gds' => get_current_date(),
				'client_modified_gds' => get_current_agent()
			]);

		return ($update ? 'success' : 'error');
	}

	public function delete(array $data): string
	{
		$id = $data['id'];

		$response = $this->db
			->select('id_gender')
			->where('id_gender', $id)
			->limit(1)
			->get('cm_genders');

		if ($response->num_rows() == 0) {
			return 'not-found';
		}

		$fDelete = $this->db
			->where('id_gender', $id)
			->delete('cm_genders');

		$sDelete = $this->db
			->where('id_gender', $id)
			->delete('cm_gen_mov');

		return (($fDelete && $sDelete) ? 'success' : 'error');
	}

	public function movies_by_gender(array $builder = array()): object
	{
		$builder['columns'] = $builder['columns'] ?? 'cm_movies.id_movie, cm_movies.id_status, cm_movies.id_quality, cm_genders.gender_name, cm_genders.gender_slug, cm_movies.movie_name, cm_movies.movie_slug, cm_movies.movie_description, cm_movies.movie_release_date, cm_movies.movie_duration, cm_movies.movie_country_origin, cm_movies.movie_cover, cm_movies.movie_reproductions, cm_movies.movie_play, cm_movies.is_premiere';
		$builder['order_column'] = $builder['order_column'] ?? 'cm_movies.id_movie';
		$builder['order_filter'] = $builder['order_filter'] ?? 'DESC';
		$builder['start'] = $builder['start'] ?? 0;

		$response = $this->db
			->select($builder['columns'])
			->from('cm_gen_mov')
			->join('cm_genders', 'cm_genders.id_gender = cm_gen_mov.id_gender')
			->join('cm_movies', 'cm_movies.id_movie = cm_gen_mov.id_movie');

		if (isset($builder['status'])) {
			$response = $response
				->where('cm_genders.id_status', $builder['status'])
				->where('cm_movies.id_status', $builder['status']);
		}

		if (isset($builder['search']) && isset($builder['value'])) {
			$response = $response
				->where($builder['search'], ((isset($builder['decrypt']) and $builder['decrypt'] == true) ? decrypt($builder['value']) : $builder['value']));
		}

		$response = $response->order_by($builder['order_column'], $builder['order_filter']);

		if (isset($builder['limit'])) {
			$response = $response->limit($builder['limit'], $builder['start']);
		}

		$response = $response->get();

		return $response;
	}
}
