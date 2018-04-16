<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_mod extends CI_model {
	

	public function pro_doc()
	{
        $sql="SELECT * FROM news order by id desc  ";
		$query=$this->db->query($sql);
		return $query;

		
	}
	
	
}
?>