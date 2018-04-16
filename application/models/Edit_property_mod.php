<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_property_mod extends CI_model {
	

	public function edit_pro($id)
	{
	    $sql="SELECT * from properties p,image i WHERE p.id=i.pid and p.id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	public function loc_list()
	{
	    $sql="SELECT * FROM location_list order by name";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
}
?>