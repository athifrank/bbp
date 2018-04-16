<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_property_mod extends CI_model {
	

	public function tit($id)
	{
	    $sql="SELECT * FROM properties where id=$id";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $result){
			$tit=$result['tit'];
		}
		return $tit;
		
	}

	
}
?>