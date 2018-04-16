<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_search_mod extends CI_model {
	
  public function search( ){
        function quote($n){
			
			return '"'.$n.'"';
			
		}
		$top_val = $_POST['search_top'];
		if(isset($_POST["search_area"])){
		$tes_loc = implode(',',array_map("quote",$_POST["search_area"]));
		}else{
			$tes_loc='';
		}
		if($top_val ==''){
			$po_loc =$tes_loc;
		}else if(isset($_POST["search_area"])){
			
			$po_loc = '"'.$top_val.'",'.$tes_loc;

		}else{
			$po_loc = '"'.$top_val.'"';
		}
		$sql="SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.loc IN ($po_loc) ORDER BY p.price DESC";
	    $query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
  }
  
  

	
}
?>