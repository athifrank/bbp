<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_properties_mod extends CI_model {
	

	public function get_loc()
	{
        $sql="SELECT * FROM properties WHERE uid='admin' order by id desc";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
	
}
?>