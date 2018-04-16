<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_documents_mod extends CI_model {
	

	public function pro_doc()
	{
        $sql="SELECT * FROM documents order by id desc ";
		$query=$this->db->query($sql);
		return $query;

		
	}
	
	
}
?>