<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_knowledge_house_mod extends CI_model {
	

	public function get_house()
	{
        $sql="SELECT * FROM knowledge_house order by id desc";
		$query=$this->db->query($sql);
		return $query;

		
	}
     
	 public function view($id){
		  $sql="SELECT * FROM knowledge_house where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
	 }
		
	public function edit($id)
	{
        $sql="SELECT * FROM knowledge_house where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;		
	}
	public function delete($id)
	{
        $sql="SELECT * FROM knowledge_house where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$title=$data['title'];
		}
		return $title;		
	}
	
}
?>