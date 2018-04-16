<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_profile_mod extends CI_model {
	

	public function update_pro()
	{
		 $uid=$_SESSION['id'];
	    $sql="SELECT * FROM users where id=$uid";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
	
}
?>