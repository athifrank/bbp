<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_details_mod extends CI_model {
	
  public function show_project($id){

	  $sql="SELECT * FROM fp where pid=$id";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }
  public function show_project2($id){

	  $sql="SELECT * FROM gallery where pid=$id";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }
	
}
?>