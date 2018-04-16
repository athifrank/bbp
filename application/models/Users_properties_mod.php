<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_properties_mod extends CI_model {
	

	public function get_user_pro()
	{
        $sql="SELECT * FROM users u JOIN properties p ON p.uid=u.id WHERE p.uid !='admin' order by p.id desc";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
	
}
?>