<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_updates_mod extends CI_model {
	

	public function get_update()
	{
        $sql="SELECT * FROM updates order by id desc";
		$query=$this->db->query($sql);
		return $query;

		
	}
	
	public function view($id)
	{
        $sql="SELECT * FROM updates where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;		
	}
		
	public function edit($id)
	{
        $sql="SELECT * FROM updates where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;		
	}
	public function delete($id)
	{
        $sql="SELECT * FROM updates where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$msg=substr($data['msg'], 0, 25);
		}
		return $msg;		
	}
	
}
?>