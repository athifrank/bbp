<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_mod extends CI_model {
	

	
	public function insert(){
		
		   $insert_user_in_database=array(
		   'eid' => $this->input->post('email'),
		   'pass'  => sha1($this->input->post('pass1')),
		   'name'       => $this->input->post('name'),
		   'add'    =>$this->input->post('add'),
		   'city'   =>$this->input->post('city'),
		   'coun'   => $this->input->post('coun'),
		   'zip'     => $this->input->post('zip'),
		   'mobi'  => $this->input->post('mobile'),
		   'cname'  => $this->input->post('cname'),
            'url'  => $this->input->post('site'),
		   'date'  => date('d-m-Y'),
		   'status'  => sha1($this->input->post('pass1')) 
		   );		   
		   
		   $query=$this->db->insert('users',$insert_user_in_database);
		   return $query;
	}

}
?>