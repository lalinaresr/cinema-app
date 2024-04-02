<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Newsletters_model extends CI_Model {

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
        public function get_all_newsletters(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_newsletters')
            ->order_by('cm_newsletters.newsletter_email', 'DESC')
            ->get();
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }
        
        /**
        * [get_some_newsletters description]
        * @return [type] [description]
        */
        public function get_some_newsletters(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_newsletters')
            ->order_by('id_newsletter', 'DESC')
            ->limit(5)
            ->get();
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }

        /**
        * [get_my_sessions description]
        * @param  [type] $id_user [description]
        * @return [type]          [description]
        */
        public function get_my_sessions($id_user){
            $this->db->where('id_user', intval($id_user));
            $this->db->order_by('id_session', 'DESC');
            $this->db->limit(5); 
            $resultSet = $this->db->get('cm_sessions');
            if ($resultSet->num_rows() > 0) {
                return $resultSet;
            } else {
                return FALSE;
            }            
        }

        /**
        * [get_some_sessions description]
        * @param  [type] $id_user [description]
        * @return [type]          [description]
        */
        public function get_some_sessions($id_user){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_sessions')
            ->join('cm_users', 'cm_users.id_user = cm_sessions.id_user')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
            ->where_not_in('cm_users.id_user', $id_user)
            ->order_by('cm_sessions.id_session', 'DESC')
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
