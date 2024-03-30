<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Status_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}
		
        /**
        * [get_all_sessions description]
        * @return [type] [description]
        */
        public function get_all_status(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_status')
            ->order_by('cm_status.id_status', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }
	}
?>
