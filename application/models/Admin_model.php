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
      $this->db->order_by('date', 'ASC');
      $query = $this->db->get($tbl);

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return 0;
      }
	}

	public function get_savings_date_range_date1($tbl, $date1, $user_id){
	  $this->db->select('*,id,date');
      $this->db->where('date >=', $date1);
      $this->db->where('user_id', $user_id);
      $this->db->order_by('date', 'ASC');
      $query = $this->db->get($tbl);

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return 0;
      }
	}

	public function get_savings_date_range_date2($tbl, $date2, $user_id){
	  $this->db->select('*,id,date');
      $this->db->where('date <=', $date2);
      $this->db->where('user_id', $user_id);
      $this->db->order_by('date', 'ASC');
      $query = $this->db->get($tbl);

      if($query->num_rows() > 0){
        return $query->result();
      }else{
        return 0;
      }
	}

}

?>