<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Qualities_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}

		/**
		* [get_all_qualitys description]
		* @return [type] [description]
		*/
		public function get_all_qualities(){
			$resultSet = $this->db
			->select('*')
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status')
			->order_by('quality_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}			
		}    

		/**
		* [get_all_qualities_activated description]
		* @return [type] [description]
		*/
		public function get_all_qualities_activated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status')
			->where('cm_qualities.id_status', 1)
			->order_by('quality_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_all_qualities_inactivated description]
		* @return [type] [description]
		*/
		public function get_all_qualities_inactivated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status')
			->where('cm_qualities.id_status', 2)
			->order_by('quality_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [insert_model description]
		* @param  [type] $insert [description]
		* @return [type]         [description]
		*/
		public function insert_model($insert){
			$this->db->where('quality_name', $insert['quality_name']);
			$resultSet = $this->db->get('cm_qualities');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_insert_quality = array(
					'id_status' => $insert['quality_status'],
					'quality_name' => $insert['quality_name'],
					'quality_slug' => $insert['quality_slug'],
					'ip_registered_qlt' => get_ip_current(),
					'date_registered_qlt' => get_date_current(),
					'client_registered_qlt' => get_agent_current()
				);
			    $insert_quality = $this->db->insert('cm_qualities', $data_insert_quality);

			    if ($insert_quality != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}  
		}    

		/**
		* [get_quality_by description]
		* @param  [type] $data  [description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_quality_by($data, $value){
			$resultSet = $this->db
			->select('*')
			->from('cm_qualities')
			->join('cm_status', 'cm_status.id_status = cm_qualities.id_status')
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
			$this->db->where('quality_name', $update['quality_name']);
			$resultSet = $this->db->get('cm_qualities');

			if ($resultSet->num_rows() > 0) { 
				echo "Already"; 
			} else {
				$data_update_quality = array(
					'id_status' => $update['quality_status'],
					'quality_name' => $update['quality_name'],
					'quality_slug' => $update['quality_slug'],
					'ip_modified_qlt' => get_ip_current(),
					'date_modified_qlt' => get_date_current(),
					'client_modified_qlt' => get_agent_current()
				);
				$this->db->where('id_quality', decryp($update['id_quality']));
			    $update_quality = $this->db->update('cm_qualities', $data_update_quality);

			    if ($update_quality != FALSE) { 
			    	echo "Success";			                          
			    } else { 
			    	echo "Error"; 
			    }                
			}
		}		

		/**
		* [delete_model description]
		* @param  [type] $id_quality [description]
		* @return [type]            [description]
		*/
		public function delete_model($id_quality){
			$this->db->where('id_quality', decryp($id_quality));
		   	$resultSet = $this->db->get('cm_qualities');

		   	if ($resultSet->num_rows() > 0) {
		   		$quality_recovered = $resultSet->row();
		   		
		   		$this->db->where('id_quality', $quality_recovered->id_quality);
		   		$quality_deleted = $this->db->delete('cm_qualities');						

		   		if ($quality_deleted != FALSE) { 		   			
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
