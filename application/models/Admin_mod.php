<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mod extends CI_model {
	

	public function login()
	{
        $sql="SELECT * FROM admin ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
	
}
?>