<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_documents_admin_mod extends CI_model {
	

	public function get_pro()
	{
        $sql="SELECT * FROM documents order by id desc";
		$query=$this->db->query($sql);
		return $query;

		
	}

		
	public function edit($id)
	{
        $sql="SELECT * FROM documents where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;		
	}
	public function delete($id)
	{
        $sql="SELECT * FROM documents where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$msg=substr($data['tit'], 0, 25);
		}
		return $msg;		
	}
	
}
?>