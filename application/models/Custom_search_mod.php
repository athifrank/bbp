<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_search_mod extends CI_model {
	
  public function cus_search(){
	  $z1= $this->input->post('ptype');
	  $z2=$this->input->post('location');
	  $z3=$this->input->post('type');
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