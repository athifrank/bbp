<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zonal_search_mod extends CI_model {
	
  public function zonal_search($i){

	  $sql="SELECT * FROM image i , properties p WHERE i.pid=p.id and p.zone like '$i%'";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }
  
  public function location_search(){
	  
	  $sql="SELECT * FROM location_list";
	   $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;
  }
  
    public function zonal_search_new($i){

	  $sql="SELECT * FROM image i , properties p WHERE i.pid=p.id and p.zone like '$i%' ORDER BY p.id DESC LIMIT 10";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }

	
}
?>