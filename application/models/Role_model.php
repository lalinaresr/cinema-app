<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Role_model extends CI_Model {

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
        public function get_all_roles(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_roles')
            ->join('cm_status', 'cm_status.id_status = cm_roles.id_status')
            ->order_by('id_rol', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }

        /**
        * [get_roles_activated description]
        * @return [type] [description]
        */
        public function get_all_roles_activated(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_roles')
            ->join('cm_status', 'cm_status.id_status = cm_roles.id_status')
            ->where('cm_roles.id_status', 1)
            ->order_by('id_rol', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }  
        }

        /**
        * [get_roles_inactivade description]
        * @return [type] [description]
        */
        public function get_all_roles_inactivade(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_roles')
            ->join('cm_status', 'cm_status.id_status = cm_roles.id_status')
            ->where('cm_roles.id_status', 2)
            ->order_by('id_rol', 'ASC')
            ->get();
            
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }  
        }
	}
?>
