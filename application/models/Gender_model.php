<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Gender_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}

		/**
		* [get_all_genders description]
		* @return [type] [description]
		*/
		public function get_all_genders(){
			$resultSet = $this->db
			->select('*')
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status')
			->order_by('gender_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}			
		}    

		/**
		* [get_genders_activated description]
		* @return [type] [description]
		*/
		public function get_all_genders_activated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status')
			->where('cm_genders.id_status', 1)
			->order_by('gender_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_genders_inactivated description]
		* @return [type] [description]
		*/
		public function get_all_genders_inactivated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status')
			->where('cm_genders.id_status', 2)
			->order_by('gender_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_movies_by_gender description]
		* @param  [type]  $limit [description]
		* @param  integer $start [description]
		* @param  [type]  $data  [description]
		* @param  [type]  $value [description]
		* @return [type]         [description]
		*/
		public function get_movies_by_gender($limit = 0, $start = 0,  $data = '', $value = ''){
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
		public function store($insert){
			$this->db->where('gender_name', $insert['gender_name']);
			$resultSet = $this->db->get('cm_genders');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_insert_gender = array(
					'id_status' => $insert['gender_status'],
					'gender_name' => $insert['gender_name'],
					'gender_slug' => $insert['gender_slug'],
					'ip_registered_gds' => get_ip_current(),
					'date_registered_gds' => get_date_current(),
					'client_registered_gds' => get_agent_current()
				);
			    $insert_gender = $this->db->insert('cm_genders', $data_insert_gender);

			    if ($insert_gender != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}  
		}    

		/**
		* [get_gender_by description]
		* @param  [type] $data  [description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_gender_by($data, $value){
			$resultSet = $this->db
			->select('*')
			->from('cm_genders')
			->join('cm_status', 'cm_status.id_status = cm_genders.id_status')
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
		public function update($update){
			$this->db->where('gender_name', $update['gender_name']);
			$resultSet = $this->db->get('cm_genders');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_update_gender = array(
					'id_status' => $update['gender_status'],
					'gender_name' => $update['gender_name'],
					'gender_slug' => $update['gender_slug'],
					'ip_modified_gds' => get_ip_current(),
					'date_modified_gds' => get_date_current(),
					'client_modified_gds' => get_agent_current()
				);
				$this->db->where('id_gender', decryp($update['id_gender']));
			    $update_gender = $this->db->update('cm_genders', $data_update_gender);

			    if ($update_gender != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}
		}		

		/**
		* [delete_model description]
		* @param  [type] $id_gender [description]
		* @return [type]            [description]
		*/
		public function delete($id_gender){
			$this->db->where('id_gender', decryp($id_gender));
		   	$resultSet = $this->db->get('cm_genders');

		   	if ($resultSet->num_rows() > 0) {
		   		$gender_recovered = $resultSet->row();
		   		
		   		$this->db->where('id_gender', $gender_recovered->id_gender);
		   		$gender_deleted = $this->db->delete('cm_genders');		
				
				$this->db->where('id_gender', $gender_recovered->id_gender);
		   		$genders_deleted = $this->db->delete('cm_gen_mov');

		   		if ($gender_deleted != FALSE && $genders_deleted != FALSE) { 		   			
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
