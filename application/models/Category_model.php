<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category_model extends CI_Model {

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
		public function get_all_categories(){
			$resultSet = $this->db
			->select('*')
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status')
			->order_by('category_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}			
		}    

		/**
		* [get_categories_activated description]
		* @return [type] [description]
		*/
		public function get_all_categories_activated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status')
			->where('cm_categories.id_status', 1)
			->order_by('category_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_categories_inactivated description]
		* @return [type] [description]
		*/
		public function get_all_categories_inactivated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status')
			->where('cm_categories.id_status', 2)
			->order_by('category_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_movies_by_category description]
		* @param  [type]  $limit [description]
		* @param  integer $start [description]
		* @param  [type]  $data  [description]
		* @param  [type]  $value [description]
		* @return [type]         [description]
		*/
		public function get_movies_by_category($limit = 0, $start = 0,  $data = '', $value = ''){
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
			->where($data, $value)
			->order_by('cm_movies.movie_name', 'DESC')
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
			$this->db->where('category_name', $insert['category_name']);
			$resultSet = $this->db->get('cm_categories');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_insert_category = array(
					'id_status' => $insert['category_status'],
					'category_name' => $insert['category_name'],
					'category_slug' => $insert['category_slug'],
					'ip_registered_cat' => get_ip_current(),
					'date_registered_cat' => get_date_current(),
					'client_registered_cat' => get_agent_current()
				);
			    $insert_category = $this->db->insert('cm_categories', $data_insert_category);

			    if ($insert_category != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}  
		} 

		/**
		* [get_category_by description]
		* @param  [type] $data  [description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_category_by($data, $value){
			$resultSet = $this->db
			->select('*')
			->from('cm_categories')
			->join('cm_status', 'cm_status.id_status = cm_categories.id_status')
			->where($data, decryp($value))
			->get('');

			if ($resultSet->num_rows() > 0) {
				return $resultSet->row();
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
			$this->db->where('category_name', $update['category_name']);
			$resultSet = $this->db->get('cm_categories');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_update_category = array(
					'id_status' => $update['category_status'],
					'category_name' => $update['category_name'],
					'category_slug' => $update['category_slug'],
					'ip_modified_cat' => get_ip_current(),
					'date_modified_cat' => get_date_current(),
					'client_modified_cat' => get_agent_current()
				);
				$this->db->where('id_category', decryp($update['id_category']));
			    $update_category = $this->db->update('cm_categories', $data_update_category);

			    if ($update_category != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}
		}

		/**
		* [delete_model description]
		* @param  [type] $id_category [description]
		* @return [type]              [description]
		*/
		public function delete_model($id_category){
			$this->db->where('id_category', decryp($id_category));
		   	$resultSet = $this->db->get('cm_categories');

		   	if ($resultSet->num_rows() > 0) {
		   		$category_recovered = $resultSet->row();

		   		$this->db->where('id_category', $category_recovered->id_category);
		   		$category_deleted = $this->db->delete('cm_categories');		

		   		$this->db->where('id_category', $category_recovered->id_category);
		   		$categories_deleted = $this->db->delete('cm_cat_mov');

		   		if ($category_deleted != FALSE && $categories_deleted != FALSE) { 
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
