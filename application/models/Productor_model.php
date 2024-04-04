<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Productor_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}

		/**
		* [get_all_productors description]
		* @return [type] [description]
		*/
		public function get_all_productors(){
			$resultSet = $this->db
			->select('*')
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->order_by('productor_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}			
		}    

		/**
		* [get_productors_activated description]
		* @return [type] [description]
		*/
		public function get_all_productors_activated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->where('cm_productors.id_status', 1)
			->order_by('productor_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_productors_inactivated description]
		* @return [type] [description]
		*/
		public function get_all_productors_inactivated(){
			$resultSet = $this->db
			->select('*')
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->where('cm_productors.id_status', 2)
			->order_by('productor_name', 'DESC')
			->get();

			if ($resultSet->num_rows() > 0) {
				return $resultSet;
			} else {
				return FALSE;
			}
		}

		/**
		* [get_movies_by_productor description]
		* @param  [type]  $limit [description]
		* @param  integer $start [description]
		* @param  [type]  $data  [description]
		* @param  [type]  $value [description]
		* @return [type]         [description]
		*/
		public function get_movies_by_productor($limit = 0, $start = 0,  $data = '', $value = ''){
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
		   	$this->db->where('productor_name', $insert['productor_name']);
		   	$resultSet = $this->db->get('cm_productors');

		   	if ($resultSet->num_rows() > 0) { 
		    	unlink(FOLDER_PRODUCTORS . $insert['productor_image_logo']);
		      	echo "Already";  
		   	} else {
		    	$data_insert_productor = array( 
		        	'id_status' => $insert['productor_status'],
		         	'productor_name' => $insert['productor_name'],
		         	'productor_slug' => $insert['productor_slug'],
		         	'productor_image_logo' => base_url() . FOLDER_PRODUCTORS . $insert['productor_image_logo'],
		         	'ip_registered_pro' => get_ip_current(),
		         	'date_registered_pro' => get_date_current(),
		         	'client_registered_pro' => get_agent_current()
		      	);
		       	$insert_productor = $this->db->insert('cm_productors', $data_insert_productor );

		       	if ($insert_productor != FALSE) { 
		        	$last_productor_inserted = $this->db->insert_id();
		         	rename(
		            	FOLDER_PRODUCTORS . $insert['productor_image_logo'], 
		            	FOLDER_PRODUCTORS . $last_productor_inserted . '_logo' . substr($insert['productor_image_logo'], -4) 
		         	);

		         	$data_update_productor = array(
		            	'productor_image_logo' => FOLDER_PRODUCTORS . $last_productor_inserted . '_logo' . substr($insert['productor_image_logo'], -4) 
		         	);
		         	$this->db->where('id_productor', $last_productor_inserted);
		         	$update_productor_image_logo = $this->db->update('cm_productors', $data_update_productor);

		         	if ($update_productor_image_logo != FALSE) {
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
		* [get_productor_by description]
		* @param  [type] $data  [description]
		* @param  [type] $value [description]
		* @return [type]        [description]
		*/
		public function get_productor_by($data, $value){
			$resultSet = $this->db
			->select('*')
			->from('cm_productors')
			->join('cm_status', 'cm_status.id_status = cm_productors.id_status')
			->where($data, decryp($value))
			->get();

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
		   	$this->db->where('productor_name', $update['productor_name']);
		   	$resultSet = $this->db->get('cm_productors');

		   	if ($resultSet->num_rows() > 0) { 
		      	if ($update['new_image_logo'] != NULL && $update['old_image_logo'] == NULL){
		        	unlink(FOLDER_PRODUCTORS . $update['new_image_logo']);               
		      	} 
		      	echo "Already";
		   	} else {
		    	$image_logo = '';
		      	if ($update['old_image_logo'] != NULL && $update['new_image_logo'] == NULL) {
		        	$image_logo = $update['old_image_logo'];
		      	} else if ($update['new_image_logo'] != NULL && $update['old_image_logo'] == NULL) {
		        	unlink(FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['old_image_ext']), -4));
		         	rename(
		            	FOLDER_PRODUCTORS . $update['new_image_logo'], 
		            	FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['new_image_logo']), -4) 
		         	);
		         	$image_logo = FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['new_image_logo']), -4); 
		      	}  

		      	$data_update_productor = array( 
		      		'productor_name' => $update['productor_name'],
		      		'productor_slug' => $update['productor_slug'],
		      		'productor_image_logo' => $image_logo,
		      		'id_status' => $update['productor_status'],
		      		'ip_modified_pro' => get_ip_current(),
		      		'date_modified_pro' => get_date_current(),
		      		'client_modified_pro' => get_agent_current()
		      	);
		      	$this->db->where('id_productor', decryp($update['id_productor']));
		        $update_productor = $this->db->update('cm_productors', $data_update_productor);

		       	if ($update_productor != FALSE) {              
		        	echo "Success";                                   
		       	} else { 
		        	echo "Error"; 
		      	}  
		   	}
		}

		/**
		* [update_logo description]
		* @param  [type] $update [description]
		* @return [type]         [description]
		*/
		public function update_logo($update){
		    $this->db->where('id_productor', decryp($update['id_productor']));
		    $resultSet = $this->db->get('cm_productors');  

		    if ($resultSet->num_rows() > 0) {
		        $productor_recovered = $resultSet->row();
		        if (strcmp($productor_recovered->productor_image_logo, 'NO-IMAGE') == 0) {
		            rename(
		                FOLDER_PRODUCTORS . $update['productor_image_logo'], 
		                FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['productor_image_logo']), -4) 
		            );
		        } else { 
		            unlink($productor_recovered->productor_image_logo);
		            rename(
		                FOLDER_PRODUCTORS . $update['productor_image_logo'], 
		                FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['productor_image_logo']), -4) 
		            );                    
		        }

		        $data_upload_logo = array(
		            'productor_image_logo' => FOLDER_PRODUCTORS . decryp($update['id_productor']) . '_logo' . substr(strtolower($update['productor_image_logo']), -4) 
		        );
		        $this->db->where('id_productor', decryp($update['id_productor']));
		        $update_logo = $this->db->update('cm_productors', $data_upload_logo);

		        if ($update_logo != NULL) {
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
		* @param  [type] $id_productor [description]
		* @return [type]               [description]
		*/
		public function delete_model($id_productor){
			$this->db->where('id_productor', decryp($id_productor));
		   	$resultSet = $this->db->get('cm_productors');

		   	if ($resultSet->num_rows() > 0) {
		   		$productor_recovered = $resultSet->row();

		   		$this->db->where('id_productor', $productor_recovered->id_productor);
		   		$productor_deleted = $this->db->delete('cm_productors');		

		   		$this->db->where('id_productor', $productor_recovered->id_productor);
		   		$productors_deleted = $this->db->delete('cm_pro_mov');

		   		if ($productor_deleted != FALSE && $productors_deleted != FALSE) { 
		   			if (strcmp($productor_recovered->productor_image_logo, 'NO-IMAGE') != 0) {
		   				unlink($productor_recovered->productor_image_logo);
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
