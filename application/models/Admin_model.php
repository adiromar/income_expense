<?php

class Admin_model extends CI_Model
{

	public function __construct(){

		$this->load->database();
	}

	public function get_savings_date_range($tbl, $date1, $date2, $user_id){
	  $this->db->select('*,id,date');
      $this->db->where('date >=', $date1);
      $this->db->where('date <=', $date2);
      $this->db->where('user_id', $user_id);
      $query = $this->db->get($tbl);

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return 0;
      }
	}

	public function get_savings_date_range_single($tbl, $date1, $date2, $user_id){
	  $this->db->select('*,id,date');
      $this->db->where('date >=', $date1);
      $this->db->or_where('date <=', $date2);
      $this->db->where('user_id', $user_id);
      $query = $this->db->get($tbl);

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return 0;
      }
	}

}

?>