<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_mod extends CI_model {
	

	public function image_slide()
	{
		$sql="SELECT i.* ,p.tit,p.loc FROM image i JOIN properties p ON i.pid=p.id where thumbs=2 order by pid desc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	public function pro_update(){
		
		$sql="SELECT * FROM updates order by id desc";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
	}
	public function feature_pro(){
		
		$sql="SELECT * FROM fp order by pos";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
	}
}
?>