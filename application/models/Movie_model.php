<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Movie_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}

		/**
		* [get_all_categories description]
		* @return [type] [description]
		*/
		public function get_all_movies(){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->order_by('movie_name', 'ASC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}			
		}    		

		/**
		* [get_movies_activated description]
		* @return [type] [description]
		*/
		public function get_all_movies_activated(){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 1)
			->order_by('cm_movies.id_movie', 'ASC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_all_movies_inactivated description]
		* @return [type] [description]
		*/
		public function get_all_movies_inactivated(){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 2)
			->order_by('cm_movies.id_movie', 'ASC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}		

		/**
		* [get_movies_most_viewed description]
		* @param  [type] $total_movies [description]
		* @return [type]               [description]
		*/
		public function get_movies_most_viewed($total_movies){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 1)
			->order_by('cm_movies.movie_reproductions', 'DESC')
			->limit(intval($total_movies))
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_new_movies description]
		* @param  [type] $total_movies [description]
		* @return [type]               [description]
		*/
		public function get_new_movies($total_movies){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 1)
			->order_by('cm_movies.id_movie', 'DESC')
			->limit(intval($total_movies))
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [fetch_movies description]
		* @param  [type] $limit [description]
		* @param  [type] $start [description]
		* @return [type]        [description]
		*/
		public function fetch_movies($limit, $start = 0) {
	        $resultSet = $this->db
	        ->select('
	        	cm_movies.id_movie,
	        	cm_movies.id_status,
	        	cm_movies.id_quality,
	        	cm_movies.movie_name,
	        	cm_movies.movie_slug,
	        	cm_movies.movie_description,
	        	cm_movies.movie_release_date,
	        	cm_movies.movie_duration,
	        	cm_movies.movie_country_origin,
	        	cm_movies.movie_cover,
	        	cm_movies.movie_reproductions,
	        	cm_movies.movie_play,
	        	cm_movies.is_premiere,
	        	cm_movies.ip_registered_mov,
	        	cm_movies.date_registered_mov,
	        	cm_movies.client_registered_mov,
	        	cm_movies.ip_modified_mov,
	        	cm_movies.date_modified_mov,
	        	cm_movies.client_modified_mov
	        ')
	        ->from('cm_movies')
	        ->where('cm_movies.id_status', 1)
	        ->order_by('cm_movies.id_movie', 'ASC')
	        ->limit($limit, $start)
	        ->get();

	        $data = array();
	        if ($resultSet->num_rows() > 0) {
	            foreach ($resultSet->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
		    return FALSE;
		}

		/**
		* [get_some_movies_activated description]
		* @return [type] [description]
		*/
		public function get_count_movies_by_productor($id_productor){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,				
				cm_productors.productor_name,
				cm_productors.productor_slug,
				cm_productors.productor_image_logo
			')
			->from('cm_pro_mov')
			->join('cm_productors', 'cm_productors.id_productor = cm_pro_mov.id_productor')
			->join('cm_movies', 'cm_movies.id_movie = cm_pro_mov.id_movie')
			->where('cm_productors.id_status', 1)
			->where('cm_movies.id_status', 1)
			->where('cm_pro_mov.id_productor', decryp($id_productor))
			->order_by('cm_movies.movie_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_count_movies_by_gender description]
		* @param  [type] $id_gender [description]
		* @return [type]            [description]
		*/
		public function get_count_movies_by_gender($id_gender){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,				
				cm_genders.gender_name,
				cm_genders.gender_slug
			')
			->from('cm_gen_mov')
			->join('cm_genders', 'cm_genders.id_gender = cm_gen_mov.id_gender')
			->join('cm_movies', 'cm_movies.id_movie = cm_gen_mov.id_movie')
			->where('cm_genders.id_status', 1)
			->where('cm_movies.id_status', 1)
			->where('cm_gen_mov.id_gender', decryp($id_gender))
			->order_by('cm_movies.movie_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_count_movies_by_category description]
		* @param  [type] $id_category [description]
		* @return [type]              [description]
		*/
		public function get_count_movies_by_category($id_category){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,				
				cm_categories.category_name,
				cm_categories.category_slug
			')
			->from('cm_cat_mov')
			->join('cm_categories', 'cm_categories.id_category = cm_cat_mov.id_category')
			->join('cm_movies', 'cm_movies.id_movie = cm_cat_mov.id_movie')
			->where('cm_categories.id_status', 1)
			->where('cm_movies.id_status', 1)
			->where('cm_cat_mov.id_category', decryp($id_category))
			->order_by('cm_movies.movie_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_count_movies_by_search description]
		* @param  [type] $movie_name_search [description]
		* @return [type]                    [description]
		*/
		public function get_count_movies_by_search($movie_name_search){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 1)
			->like('cm_movies.movie_name', $movie_name_search)
			->order_by('cm_movies.id_movie', 'ASC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_movies_by_search description]
		* @param  [type]  $limit             [description]
		* @param  integer $start             [description]
		* @param  [type]  $movie_name_search [description]
		* @return [type]                     [description]
		*/
		public function get_movies_by_search($limit = 0, $start = 0, $movie_name_search = ''){
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where('cm_movies.id_status', 1)
			->like('LOWER( cm_movies.movie_name )', $movie_name_search)
			->order_by('cm_movies.id_movie', 'ASC')
			->limit($limit, $start)
			->get();

			$data = array();
	        if ($resultSet->num_rows() > 0) {
	            foreach ($resultSet->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
		    return FALSE;
		}

		/**
		* [insert_model description]
		* @param  [type] $insert [description]
		* @return [type]         [description]
		*/
		public function insert_model($insert){		
			$this->db->where('movie_name', $insert['movie_name']);
			$resultSet = $this->db->get('cm_movies');

			if ($resultSet->num_rows() > 0) { 
				unlink(FOLDER_MOVIES . $insert['movie_cover']);
				echo "Already"; 
			} else {
				$data_insert_movie = array( 
					'id_status' => $insert['movie_status'],
					'id_quality' => $insert['movie_quality'],
				    'movie_name' => $insert['movie_name'],
				    'movie_slug' => $insert['movie_slug'],
				    'movie_description' => $insert['movie_description'],
				    'movie_release_date' => $insert['movie_release_date'],
				    'movie_duration' => $insert['movie_duration'],
				    'movie_country_origin' => $insert['movie_country_origin'],
				    'movie_cover' => FOLDER_MOVIES . $insert['movie_cover'],
				    'movie_reproductions' => 0,
				    'movie_play' => $insert['movie_play'],
				    'is_premiere' => 0,
				    'ip_registered_mov' => get_ip_current(),
				    'date_registered_mov' => get_date_current(),
				    'client_registered_mov' => get_agent_current()
				);
				$insert_movie = $this->db->insert('cm_movies', $data_insert_movie);

				if ($insert_movie != FALSE) { 
					$movie_inserted_current = $this->db->insert_id();

					rename(
						FOLDER_MOVIES . $insert['movie_cover'], 
						FOLDER_MOVIES . $movie_inserted_current . '_cover' . substr($insert['movie_cover'], -4) 
					);

					$this->db->where('id_movie', $movie_inserted_current);
					$update_movie_cover = $this->db->update('cm_movies', [ 'movie_cover' => FOLDER_MOVIES . $movie_inserted_current . '_cover' . substr($insert['movie_cover'], -4) ]);

					foreach ($insert['ids_productors'] as $key => $value) {
						$this->db->insert('cm_pro_mov', [
							'id_productor' => $value,
							'id_movie' => $movie_inserted_current 
						]);
					}

					foreach ($insert['ids_genders'] as $key => $value) {
						$this->db->insert('cm_gen_mov', [
							'id_gender' => $value,
							'id_movie' => $movie_inserted_current 
						]);
					}

					foreach ($insert['ids_categories'] as $key => $value) {
						$this->db->insert('cm_cat_mov', [
							'id_category' => $value,
							'id_movie' => $movie_inserted_current 
						]);
					}

					if ($update_movie_cover != FALSE) {						
						echo "Success";		
					} else {
						echo "Error";
					}			    		                          	                          
				} else { 
					echo "Error"; 
				} 
			} 
		}

		/**
		* [get_movie_by description]
		* @param  [type] $field [description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_movie_by( $field, $value ) {
			$resultSet = $this->db
			->select('
				cm_movies.id_movie,
				cm_movies.id_status,
				cm_movies.id_quality,
				cm_movies.movie_name,
				cm_movies.movie_slug,
				cm_movies.movie_description,
				cm_movies.movie_release_date,
				cm_movies.movie_duration,
				cm_movies.movie_country_origin,
				cm_movies.movie_cover,
				cm_movies.movie_reproductions,
				cm_movies.movie_play,
				cm_movies.is_premiere,
				cm_movies.ip_registered_mov,
				cm_movies.date_registered_mov,
				cm_movies.client_registered_mov,
				cm_movies.ip_modified_mov,
				cm_movies.date_modified_mov,
				cm_movies.client_modified_mov,
				cm_status.id_status,
				cm_status.status_name,
				cm_qualities.id_quality,
				cm_qualities.quality_name')
			->from('cm_movies')
			->join('cm_status', 'cm_status.id_status = cm_movies.id_status')
			->join('cm_qualities', 'cm_qualities.id_quality = cm_movies.id_quality')
			->where($field, decryp($value))
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet->row();
			} else {
				return FALSE;
			}
		}

		/**
		* [get_productors_movie description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_productors_movie($value){
			$resultSet = $this->db
			->select('*')
			->from('cm_pro_mov')
			->join('cm_productors', 'cm_productors.id_productor = cm_pro_mov.id_productor')
			->join('cm_movies', 'cm_movies.id_movie = cm_pro_mov.id_movie')
			->where('cm_pro_mov.id_movie', decryp($value))
			->get();

			/* Generate Code 
			* SELECT 
			* `cm_pro_mov`.`id_productor`, 
			* `cm_productors`.`productor_name`, 
			* `cm_movies`.`movie_name`,
			* `cm_movies`.`id_movie`
			* FROM `cm_pro_mov` 
			* JOIN `cm_productors` ON `cm_pro_mov`.`id_productor` = `cm_productors`.`id_productor` 
			* JOIN `cm_movies` ON `cm_pro_mov`.`id_movie` = `cm_movies`.`id_movie`  
			* WHERE `cm_pro_mov`. `id_movie` = 2
			*/

			if ($resultSet->num_rows() > 0) {
				return $resultSet->result();
			} else {
				return FALSE;
			}
		}

		/**
		* [get_genders_movie description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_genders_movie($value){
			$resultSet = $this->db
			->select('*')
			->from('cm_gen_mov')
			->join('cm_genders', 'cm_genders.id_gender = cm_gen_mov.id_gender')
			->join('cm_movies', 'cm_movies.id_movie = cm_gen_mov.id_movie')
			->where('cm_gen_mov.id_movie', decryp($value))
			->get();

			/* Generate Code 
			* SELECT 
			* `cm_gen_mov`.`id_gender`, 
			* `cm_genders`.`gender_name`, 
			* `cm_movies`.`movie_name`,
			* `cm_movies`.`id_movie`
			* FROM `cm_gen_mov` 
			* JOIN `cm_genders` ON `cm_gen_mov`.`id_gender` = `cm_productors`.`id_gender` 
			* JOIN `cm_movies` ON `cm_gen_mov`.`id_movie` = `cm_movies`.`id_movie`  
			* WHERE `cm_gen_mov`. `id_movie` = 2
			*/

			if ($resultSet->num_rows() > 0) {
				return $resultSet->result();
			} else {
				return FALSE;
			}
		}

		/**
		* [get_categories_movie description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_categories_movie($value){
			$resultSet = $this->db
			->select('*')
			->from('cm_cat_mov')
			->join('cm_categories', 'cm_categories.id_category = cm_cat_mov.id_category')
			->join('cm_movies', 'cm_movies.id_movie = cm_cat_mov.id_movie')
			->where('cm_cat_mov.id_movie', decryp($value))
			->get();

			/* Generate Code 
			* SELECT 
			* `cm_cat_mov`.`id_category`, 
			* `cm_categories`.`category_name`, 
			* `cm_movies`.`movie_name`,
			* `cm_movies`.`id_movie`
			* FROM `cm_cat_mov` 
			* JOIN `cm_categories` ON `cm_cat_mov`.`id_category` = `cm_categories`.`id_category` 
			* JOIN `cm_movies` ON `cm_cat_mov`.`id_movie` = `cm_movies`.`id_movie`  
			* WHERE `cm_cat_mov`. `id_movie` = 2
			*/

			if ($resultSet->num_rows() > 0) {
				return $resultSet->result();
			} else {
				return FALSE;
			}
		}

		/**
		* [update_model description]
		* @param  [type] $update [description]
		* @return [type]         [description]
		*/
		public function update_model($update){		
			$movie_cover_end = '';

			/*$this->db->where('movie_name', $update['movie_name']);
			$resultSet = $this->db->get('cm_movies');

			if ($resultSet->num_rows() > 0) { 
				if ($update['new_image_cover'] != NULL && $update['old_image_cover'] == NULL){
					unlink(FOLDER_MOVIES . $update['new_image_cover']);					
				} 
				echo "Already";
			} else {
				## AQUI VA EL CODIGO DE ACTUALIZACION Y MODIFICACION DE LA IMAGEN
			}*/

			if ($update['old_image_cover'] != NULL && $update['new_image_cover'] == NULL) {
				$movie_cover_end = $update['old_image_cover'];
			} else if ($update['new_image_cover'] != NULL && $update['old_image_cover'] == NULL) {
		    	unlink(FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['old_image_ext']), -4));
				rename(
					FOLDER_MOVIES . $update['new_image_cover'], 
					FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['new_image_cover']), -4) 
				);
				$movie_cover_end = FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['new_image_cover']), -4); 
			}
			$this->db->where('id_movie', decryp($update['id_movie']));
			$data_update_movie = array(
				'id_status' => $update['movie_status'],
				'id_quality' => $update['movie_quality'],
				'movie_name' => $update['movie_name'],
				'movie_slug' => $update['movie_slug'],
				'movie_release_date' => $update['movie_release_date'],
				'movie_duration' => $update['movie_duration'],
				'movie_country_origin' => $update['movie_country_origin'],
				'movie_cover' => $movie_cover_end,			        
				'movie_description' => $update['movie_description'],
				'movie_play' => $update['movie_play'],
				'ip_modified_mov' => get_ip_current(),
				'date_modified_mov' => get_date_current(),
				'client_modified_mov' => get_agent_current()
			);
		    $update_movie = $this->db->update('cm_movies', $data_update_movie);

		    $this->db->where('id_movie', decryp($update['id_movie']));
		    $this->db->delete('cm_gen_mov');
		    $this->db->where('id_movie', decryp($update['id_movie']));
		    $this->db->delete('cm_pro_mov');
		    $this->db->where('id_movie', decryp($update['id_movie']));
		    $this->db->delete('cm_cat_mov');

		    foreach ($update['ids_productors'] as $key => $value) {
		    	$this->db->insert('cm_pro_mov', [
		    		'id_productor' => $value,
		    		'id_movie' => decryp($update['id_movie'])
		    	]);
		    }

		    foreach ($update['ids_genders'] as $key => $value) {
		    	$this->db->insert('cm_gen_mov', [
		    		'id_gender' => $value,
		    		'id_movie' => decryp($update['id_movie'])
		    	]);
		    }

		    foreach ($update['ids_categories'] as $key => $value) {
		    	$this->db->insert('cm_cat_mov', [
		    		'id_category' => $value,
		    		'id_movie' => decryp($update['id_movie'])
		    	]);
		    }

		    if ($update_movie != FALSE) {			    			    		    	
		    	echo "Success";			                          
		    } else { 
		    	echo "Error"; 
		    }  
		}

		/**
		* [update_reproductions description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function update_reproductions($id_movie){
			$this->db->where('id_movie', decryp($id_movie));
			$resultSet = $this->db->get('cm_movies');

			if ($resultSet->num_rows() > 0) {
				$movie_recovered = $resultSet->row();

				$data_update_reproductions = array(
					'movie_reproductions' => ($movie_recovered->movie_reproductions + 1)
				);
				$this->db->where('id_movie', decryp($id_movie));
				$update_reproductions = $this->db->update('cm_movies', $data_update_reproductions);
			}
		}

		/**
		* [update_cover description]
		* @param  [type] $update [description]
		* @return [type]         [description]
		*/
		public function update_cover($update){
		    $this->db->where('id_movie', decryp($update['id_movie']));
		    $resultSet = $this->db->get('cm_movies');  

		    if ($resultSet->num_rows() > 0) {
		        $movie_recovered = $resultSet->row();
		        
		        if (strcmp($movie_recovered->movie_cover, 'NO-IMAGE') == 0) {
		            rename(
		                FOLDER_MOVIES . $update['movie_cover'], 
		                FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['movie_cover']), -4) 
		            );
		        } else { 
		            unlink($movie_recovered->movie_cover);
		            rename(
		                FOLDER_MOVIES . $update['movie_cover'], 
		                FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['movie_cover']), -4) 
		            );                    
		        }

		        $data_upload_cover = array(
		            'movie_cover' => FOLDER_MOVIES . decryp($update['id_movie']) . '_cover' . substr(strtolower($update['movie_cover']), -4) 
		        );
		        $this->db->where('id_movie', decryp($update['id_movie']));
		        $update_cover = $this->db->update('cm_movies', $data_upload_cover);

		        if ($update_cover != FALSE) {
		            echo "Success";
		        } else {
		            echo "Error";
		        }
		    } else {
		        echo "Missing";
		    }
		}

		/**
		* [delete_model description]
		* @param  [type] $id_movie [description]
		* @return [type]           [description]
		*/
		public function delete_model($id_movie){
			$this->db->where('id_movie', decryp($id_movie));
		   	$resultSet = $this->db->get('cm_movies');

		   	if ($resultSet->num_rows() > 0) {
		   		$movie_recovered = $resultSet->row();

		   		$this->db->where('id_movie', $movie_recovered->id_movie);
		   		$movie_deleted = $this->db->delete('cm_movies');				   		  		

		   		$this->db->where('id_movie', $movie_recovered->id_movie);
		   		$productors_deleted = $this->db->delete('cm_pro_mov');

		   		$this->db->where('id_movie', $movie_recovered->id_movie);
		   		$genders_deleted = $this->db->delete('cm_gen_mov');

		   		$this->db->where('id_movie', $movie_recovered->id_movie);
		   		$categories_deleted = $this->db->delete('cm_cat_mov');

		   		if ($movie_deleted != FALSE && $productors_deleted != FALSE && $genders_deleted != FALSE && $categories_deleted != FALSE) { 	
		   			if (strcmp($movie_recovered->movie_cover, 'NO-IMAGE') != 0) {
		   				unlink($movie_recovered->movie_cover);
		   			}	   			
		   			echo "Success";		                         
		   		} else { 
		   			echo "Error"; 
		   		} 
		   	} else {
		   		echo "Missing";		   			   		
		   	}
		}
	}
?>
