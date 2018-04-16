<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_property_mod extends CI_model {
	

	public function get_loc()
	{
        $sql="SELECT * FROM location_list order by name";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
		
	}
	
	public function get_zone()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$data=$data['zone'];
		}
		return $data;
		
	}
		public function get_aut()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['aa'];
		}
		return $aa;
		
	}
			public function ptype()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['ptype'];
		}
		return $aa;
		
	}
	public function loc()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['loc'];
		}
		return $aa;
		
	}
	
	public function pfrom()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['pfrom'];
		}
		return $aa;
		
	}
	public function bank()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['bank'];
		}
		return $aa;
		
	}
			public function bhk()
	{
        $sql="SELECT * FROM properties ";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$aa=$data['bhk'];
		}
		return $aa;
		
	}
	
}
?>