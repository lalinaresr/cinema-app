<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth_model extends CI_Model {

        /**
        * [__construct description]
        */
		public function __construct(){
			parent::__construct();

            $this->load->model('Sessions_model');
		}
		
        /**
        * [login_model description]
        * @param  [type] $login [description]
        * @return [type]        [description]
        */
		public function login_model($login){
			$user_recovered = $this->db
            ->select('*')
            ->from('cm_users')
            ->where('user_email', $login['email'])
            ->where('id_status', 1) 
            ->get();

            $type_logged = '';
            if ($user_recovered->num_rows() > 0) {
                $user_actived = $user_recovered->row();
                if (password_verify($login['password'], $user_actived->user_password)) {  
                    switch ($user_actived->id_rol) {
                        case 1:
                            $type_logged = 'is_admin_logged_in';
                            break;
                        case 2:
                            $type_logged = 'is_user_logged_in';
                            break;
                        case 3:
                            $type_logged = 'is_guest_logged_in';
                            break;
                        default:
                            break;
                    }

                    $user_current = array(
                        $type_logged => true,
                        'id_user' => $user_actived->id_user, 
                        'id_contact' => $user_actived->id_contact, 
                        'id_rol' => $user_actived->id_rol, 
                        'id_status' => $user_actived->id_status, 
                        'user_username' => $user_actived->user_username, 
                        'user_email' => $user_actived->user_email, 
                        'user_password' => $user_actived->user_password, 
                        'user_avatar' => $user_actived->user_avatar
                    );

                    $this->session->set_userdata($user_current); 

                    $insert_session = $this->Sessions_model->insert_model($this->session->userdata('id_user'));

                    echo "Success";
                }else{ echo "Error"; }
            }else{ echo "Missing"; }
		}       

        /**
        * [send_mailing description]
        * @param  [type] $to      [description]
        * @param  [type] $subject [description]
        * @param  [type] $message [description]
        * @return [type]          [description]
        */
		public function send_mailing($to, $subject, $message){
			$this->load->library('email');

			$details_mail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => GMAIL['EMAIL'],
				'smtp_pass' => GMAIL['PASSWORD'],
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);    
			
			$this->email->initialize($details_mail);
			
			$this->email->from(GMAIL['EMAIL']);
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();
		}
	}
?>
