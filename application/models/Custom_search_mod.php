<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_search_mod extends CI_model {
	
  public function cus_search($z1,$z2,$z3){
	 
	  if($z3){
	  $sql="SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype='$z1' and p.loc='$z2' and p.br='$z3'";
	  }else{
		 $sql="SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype='$z1' and p.loc='$z2'"; 
	  }
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;	 
  }

	
}
?>