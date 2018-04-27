<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_search_mod extends CI_model {
	
  public function search($search_top,$search_area){
        function quote($n){
			
			return '"'.$n.'"';
			
		}
		$top_val = $search_top;
		
		if($search_area){
		$tes_loc = implode(',',array_map("quote",$search_area));
		}else{
			$tes_loc='';
		}
		
		if($top_val ==''){
			$po_loc =$tes_loc;
		}else if($search_area){
			
			$po_loc = '"'.$top_val.'",'.$tes_loc;

		}else{
			$po_loc = '"'.$top_val.'"';
		}
		
		$sql="SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.loc IN ($po_loc) ORDER BY p.price DESC";
	    $query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
  }
  
  
  public function custom_search($search_top,$search_area,$ptype,$loc,$br){
        function quote($n){
			
			return '"'.$n.'"';
			
		}
		$top_val = $search_top;
		
		if($search_area){
		$tes_loc = implode(',',array_map("quote",$search_area));
		}else{
			$tes_loc='';
		}
		
		if($top_val ==''){
			$po_loc =$tes_loc;
		}else if($search_area){
			
			$po_loc = '"'.$top_val.'",'.$tes_loc;

		}else{
			$po_loc = '"'.$top_val.'"';
		}
		if($br){
		$sql="SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.loc IN ($po_loc) and p.ptype='$ptype' and p.br='$br' ORDER BY p.price DESC";
		}else{
		$sql="SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.loc IN ($po_loc) and p.ptype='$ptype' ORDER BY p.price DESC";	
		}
	    $query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
  }
  
  

	
}
?>