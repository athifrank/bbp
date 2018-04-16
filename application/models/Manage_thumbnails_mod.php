<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_thumbnails_mod extends CI_model {
	

	public function get_thumb()
	{
        $sql="SELECT * FROM image where thumbs=2 order by thumbs desc";
		$query=$this->db->query($sql);
		return $query;

		
	}
	

	public function delete($id)
	{
        $sql="SELECT * FROM image where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$name=$data['fname'];
		}
		return $name;		
	}
	
}
?>