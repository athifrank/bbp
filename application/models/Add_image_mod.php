<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_image_mod extends CI_model {
	

	public function get_loc()
	{
	   $uid=$_SESSION['id']; 
        $sql="SELECT id,tit FROM properties WHERE uid=$uid ORDER BY id DESC LIMIT 1";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
	public function admin_add_img()
	{
		
        $sql="SELECT id,tit FROM properties WHERE uid='admin' ORDER BY id DESC LIMIT 1";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;

		
	}
	
}
?>