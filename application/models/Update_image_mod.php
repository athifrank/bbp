<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_image_mod extends CI_model {
	

	public function up_img($id)
	{
	    $sql="SELECT * from properties p,image i WHERE p.id=i.pid and p.id=$id";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
	
}
?>