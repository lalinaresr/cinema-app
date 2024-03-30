<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Suggestions_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}
		
        /**
        * [get_all_suggestions description]
        * @return [type] [description]
        */
        public function get_all_suggestions(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_suggestions')
            ->join('cm_status', 'cm_status.id_status = cm_suggestions.id_status')
            ->order_by('id_suggestion', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }

        /**
        * [get_suggestions_activated description]
        * @return [type] [description]
        */
        public function get_all_suggestions_activated(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_suggestions')
            ->join('cm_status', 'cm_status.id_status = cm_suggestions.id_status')
            ->where('cm_suggestions.id_status', 1)
            ->order_by('id_suggestion', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }  
        }

        /**
        * [get_suggestions_inactivade description]
        * @return [type] [description]
        */
        public function get_all_suggestions_inactivade(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_suggestions')
            ->join('cm_status', 'cm_status.id_status = cm_suggestions.id_status')
            ->where('cm_suggestions.id_status', 2)
            ->order_by('id_suggestion', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }  
        }

        /**
        * [get_some_suggestions description]
        * @return [type] [description]
        */
        public function get_some_suggestions(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_suggestions')
            ->join('cm_status', 'cm_status.id_status = cm_suggestions.id_status')
            ->where('cm_suggestions.id_status', 1)
            ->order_by('id_suggestion', 'ASC')
            ->limit(5)
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }  
        }
	}
?>
