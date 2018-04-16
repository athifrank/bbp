<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class slider1_mod extends CI_model {
	

	public function price_min()
	{
		$rs ="SELECT min(price) min from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['min'];
			}
		}
	}
	
		public function price_max()
	{
		$rs ="SELECT max(price) max from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['max'];
			}
		}
	}
	
		public function area_min()
	{
		$rs ="SELECT min(area) min from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['min'];
			}
		}
	}
	
			public function area_max()
	{
		$rs ="SELECT max(area) max from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['max'];
			}
		}
	}
	
			public function bhk_min()
	{
		$rs ="SELECT min(bhk) min from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['min'];
			}
		}
	}
	
			public function bhk_max()
	{
		$rs ="SELECT max(bhk) max from properties";
		$query=$this->db->query($rs);
	   if($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			foreach($row as $result){
			 return $result['max'];
			}
		}
	}
	
}
?>