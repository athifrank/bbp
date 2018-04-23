<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare_properties_mod extends CI_model {
	
  public function com_pro(){
	 $i=$this->input->post('i');
	 $c=$this->input->post('c');
	 $cn = count($c);
	 	if($cn == 2){
			$sql = $this->db->query("SELECT * from properties WHERE id in ($c[0] ,$c[1])");
		}
		else {
			$sql =$this->db->query("SELECT * from properties WHERE id in ($c[0] ,$c[1] ,$c[2])");
			}
	   $row=$sql->result_array();
	   return $row;	 
  }

	
}
?>