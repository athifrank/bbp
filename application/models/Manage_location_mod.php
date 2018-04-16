<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_location_mod extends CI_model {
	

	public function get_loc($limit, $start)
	{
        $sql='SELECT * FROM location_list order by name asc LIMIT ' . $start . ', ' . $limit;
		$query=$this->db->query($sql);
		return $query;		
	}
	
	public function delete($id)
	{
        $sql="SELECT * FROM location_list where id='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$name=$data['name'];
		}
		return $name;		
	}	
}
?>