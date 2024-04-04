<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Session_model extends CI_Model {

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
        public function get_all_sessions(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_sessions')
            ->join('cm_users', 'cm_users.id_user = cm_sessions.id_user')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
            ->order_by('cm_sessions.id_session', 'DESC')
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

        /**
        * [insert_model description]
        * @param  [type] $id_user [description]
        * @return [type]          [description]
        */
        public function insert_model($id_user){
            $insert_session = $this->db->insert('cm_sessions', [
                'id_user' => $id_user,
                'session_browser_used' => ucfirst(strtolower(detect_client()['browsers'])),
                'session_os_used' => ucfirst(strtolower(detect_client()['os'])),
                'session_browser_version' => detect_client()['version'],
                'ip_registered_ses' => get_ip_current(),    
                'date_registered_ses' => get_date_current(),    
                'client_registered_ses' => get_agent_current()
            ]); 

            if ($insert_session != FALSE) { 
                return "Success";			                          
            } else { 
                return "Error"; 
            }
        }
	}
?>
