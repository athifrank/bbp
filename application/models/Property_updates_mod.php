<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_updates_mod extends CI_model {
	
  public function pro_up(){

	  $sql="SELECT * FROM updates order by id desc";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }

	
}
?>