<?php

class User_model extends CI_Model
{

	public function __construct(){

		$this->load->database();
	}

	public function insertUser($log_data){
		if($this->db->insert("user_login", $log_data)){
			return TRUE;
		}else{
			return False;
		}
	}

	public function check_userLogin($email,$upass)
	{
		
		$this->db->where('email', $email);
		$this->db->where('password', $upass);
		$this->db->where('status', 1);
		
		$result_set = $this->db->get('user_login');
		if($result_set->num_rows() > 0)
		{
			return $result_set->row_array();
		}
		else
		{
			return FALSE;
		}
	}

}

?>