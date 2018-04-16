<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge_house_mod extends CI_model {
	

	public function know()
	{
	  $sql="SELECT * from knowledge_house";
	 $getimages = $this->db->query($sql);
	 return $getimages;
			
	}
	public function view_know($id)
	{
	  $sql="SELECT * FROM knowledge_house WHERE id = '$id'";
	 $getimages = $this->db->query($sql);
	 return $getimages;
			
	}
	
}
?>