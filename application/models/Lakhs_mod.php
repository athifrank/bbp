<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lakhs_mod extends CI_model {
	

	public function id_find($id)
	{
        $sql="SELECT * from properties p,image i WHERE p.id=i.pid and p.id=$id";
		return $query=$this->db->query($sql);
		
	}
	
	
}
?>