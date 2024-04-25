<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();
		}
		
        /**
        * [get_all_users description]
        * @return [type] [description]
        */
        public function get_all_users(){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_users')
            ->join('cm_contacts', 'cm_contacts.id_contact = cm_users.id_contact')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
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
        public function store($insert){
            $this->db->where('user_username', $insert['user_username']);
            $this->db->where('user_email', $insert['user_email']);
            $resultSet = $this->db->get('cm_users');

            if ($resultSet->num_rows() > 0) { 
                echo "Already"; 
            } else {
                $data_insert_contact = array( 
                    'id_status' => $insert['user_status'],
                    'contact_firstname' => $insert['contact_firstname'],
                    'contact_lastname' => $insert['contact_lastname'],
                    'contact_sex' => $insert['contact_sex'],
                    'contact_date_birthday' => $insert['contact_date_birthday'],
                    'ip_registered_cnt' => get_ip_current(),
                    'date_registered_cnt' => get_date_current(),
                    'client_registered_cnt' => get_agent_current()
                );
                $insert_contact = $this->db->insert('cm_contacts', $data_insert_contact);

                if ($insert_contact != FALSE) {
                    $last_contact_inserted = $this->db->insert_id();
                    $data_insert_user = array(
                        'id_contact' => $last_contact_inserted,
                        'id_rol' => $insert['user_rol'],
                        'id_status' => $insert['user_status'],
                        'user_username' => $insert['user_username'],
                        'user_email' => $insert['user_email'],
                        // 'user_password' => password_hash($insert['user_password'], PASSWORD_DEFAULT),
                        'user_password' => password_hash('password', PASSWORD_DEFAULT),
                        'user_avatar' => 'NO-IMAGE',
                        'ip_registered_usr' => get_ip_current(),
                        'date_registered_usr' => get_date_current(),
                        'client_registered_usr' => get_agent_current()
                    );
                    $insert_user = $this->db->insert('cm_users', $data_insert_user);   

                    if ($insert_user != FALSE) {
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
        * [get_user_by description]
        * @param  [type] $data  [description]
        * @param  [type] $value [description]
        * @return [type]        [description]
        */
        public function get_user_by($data, $value){
            $resultSet = $this->db
            ->select('*')
            ->from('cm_users')
            ->join('cm_contacts', 'cm_contacts.id_contact = cm_users.id_contact')
            ->join('cm_roles', 'cm_roles.id_rol = cm_users.id_rol')
            ->join('cm_status', 'cm_status.id_status = cm_users.id_status')
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
        public function update($update){
            $this->db->where('user_username', $update['user_username']);
            $this->db->where('user_email', $update['user_email']);
            $resultSet = $this->db->get('cm_users');

            if ($resultSet->num_rows() > 0) { 
                echo "Already"; 
            } else {
                $data_update_contact = array(
                    'id_status' => $update['user_status'],
                    'contact_firstname' => $update['user_firstname'],
                    'contact_lastname' => $update['user_lastname'],
                    'contact_date_birthday' => $update['user_date_birthday'],
                    'contact_sex' => $update['user_sex'],
                    'ip_modified_cnt' => get_ip_current(),
                    'date_modified_cnt' => get_date_current(),
                    'client_modified_cnt' => get_agent_current()
                );
                $this->db->where('id_contact', decryp($update['user_contact']));            
                $update_contact = $this->db->update('cm_contacts', $data_update_contact );

                if ($update_contact != FALSE) {
                    $data_update_user = array(
                        'id_contact' => decryp($update['user_contact']),
                        'id_rol' => $update['user_rol'],
                        'id_status' => $update['user_status'],
                        'user_username' => $update['user_username'],
                        'user_email' => $update['user_email'],
                        // 'user_password' => password_hash($update['user_password'], PASSWORD_DEFAULT),
                        'user_password' => password_hash('password', PASSWORD_DEFAULT),
                        'ip_modified_usr' => get_ip_current(),
                        'date_modified_usr' => get_date_current(),
                        'client_modified_usr' => get_agent_current()
                    );
                    $this->db->where('id_user', decryp($update['id_user']));
                    $update_user = $this->db->update('cm_users', $data_update_user);   

                    if ($update_user != FALSE) {                        
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
        * [has_user_avatar description]
        * @param  [type]  $id_user [description]
        * @return boolean          [description]
        */
        public function has_user_avatar($id_user){
            $image_avatar = '';

            $this->db->where('id_user', $id_user);
            $resultSet = $this->db->get('cm_users');
            
            if ($resultSet->num_rows() > 0) {
                $user_recovered = $resultSet->row();

                if (strcmp($user_recovered->user_avatar, 'NO-IMAGE') == 0){
                   $image_avatar = encryp_image_base64(base_url() . 'storage/images/users/default.png');
                } else{
                   $image_avatar = encryp_image_base64(base_url() . $user_recovered->user_avatar);
                }
            } else {
                $image_avatar = 'NO-IMAGE';
            }
            
            return $image_avatar;
        }

        /**
        * [update_avatar description]
        * @param  [type] $update [description]
        * @return [type]         [description]
        */
        public function update_avatar($update){
            $this->db->where('id_user', decryp($update['id_user']));
            $resultSet = $this->db->get('cm_users');  

            if ($resultSet->num_rows() > 0) {
                $user_recovered = $resultSet->row();
                if (strcmp($user_recovered->user_avatar, 'NO-IMAGE') == 0) {
                    rename(
                        FOLDER_AVATARS . $update['user_avatar'], 
                        FOLDER_AVATARS . decryp($update['id_user']) . '_avatar' . substr(strtolower($update['user_avatar']), -4) 
                    );
                } else { 
                    unlink($user_recovered->user_avatar);
                    rename(
                        FOLDER_AVATARS . $update['user_avatar'], 
                        FOLDER_AVATARS . decryp($update['id_user']) . '_avatar' . substr(strtolower($update['user_avatar']), -4) 
                    );                    
                }

                $data_upload_avatar = array(
                    'user_avatar' => FOLDER_AVATARS . decryp($update['id_user']) . '_avatar' . substr(strtolower($update['user_avatar']), -4) 
                );
                $this->db->where('id_user', decryp($update['id_user']));
                $update_avatar = $this->db->update('cm_users', $data_upload_avatar);

                if ($update_avatar != NULL) {
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
        * @param  [type] $id_user [description]
        * @return [type]          [description]
        */
        public function delete($id_user){
            $this->db->where('id_user', decryp($id_user));
            $resultSet = $this->db->get('cm_users');  

            if ($resultSet->num_rows() > 0) {
                $user_recovered = $resultSet->row();
                
                $this->db->where('id_contact', $user_recovered->id_contact);
                $contact_deleted = $this->db->delete('cm_contacts');

                $this->db->where('id_session', $user_recovered->id_user);
                $sessions_deleted = $this->db->delete('cm_sessions');

                $this->db->where('id_user', $user_recovered->id_user);
                $user_deleted = $this->db->delete('cm_users');

                if ($contact_deleted != FALSE && $user_deleted != FALSE && $sessions_deleted != FALSE) {
                    if (strcmp($user_recovered->user_avatar, 'NO-IMAGE') != 0) {
                        unlink($user_recovered->user_avatar);
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
