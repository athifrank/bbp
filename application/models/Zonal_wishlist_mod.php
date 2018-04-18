<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zonal_wishlist_mod extends CI_model {
	
  public function add_list($i,$col,$user){

	  $sql="INSERT INTO `wish_list` (`w_id`, `p_id`,`col`,`u_id`) VALUES (NULL, '$i','$col','$user')";
	  $this->db->query($sql);
  }
  
  public function get_val($id){

	  $sql="select * from wish_list where u_id='$id'";
	  $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;
  }
  
  public function get_pro($id){
	  
	  //SELECT * FROM image i INNER JOIN properties p on i.pid=p.id inner join wish_list w on p.id=w.p_id where u_id=$id//working

	  //SELECT * FROM image i INNER JOIN properties p on i.pid=p.id INNER JOIN users u on p.uid=u.id INNER JOIN wish_list w on u.id=w.u_id
        if($id){
	   $sql="SELECT * FROM image i INNER JOIN properties p on i.pid=p.id inner join wish_list w on p.id=w.p_id where u_id=$id";
	   $query=$this->db->query($sql);
	   $row=$query->result_array();
	   return $row;
		}else{
			echo '';
		}
  }
  


  
  
  
	
}
?>