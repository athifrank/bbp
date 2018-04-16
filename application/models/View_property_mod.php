<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_property_mod extends CI_model {
	

	public function view_pro($id)
	{
	    $sql="SELECT * from properties p,image i WHERE p.id=i.pid and p.id=$id";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
		public function admin_pro($id)
	{
	    $sql="SELECT * from properties p,image i WHERE p.id=i.pid and p.id=$id";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
	
}
?>