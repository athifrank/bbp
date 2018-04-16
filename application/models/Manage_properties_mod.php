<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_properties_mod extends CI_model {
	

	public function get_loc()
	{
	   $uid=$_SESSION['id']; 
        $sql="SELECT * FROM properties WHERE uid=$uid order by id desc";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
	
}
?>