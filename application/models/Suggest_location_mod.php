<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggest_location_mod extends CI_model {
	

	public function location($val)
	{
		$rs ="select name from location_list where name like '$val%' order by name asc limit 0,10";
		$query=$this->db->query($rs);
		$row=$query->result_array();
		return $row;
	}
	
}
?>