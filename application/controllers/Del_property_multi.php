<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_property_multi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		//$this->load->model('delete_property_mod');

	}
	public function index()
	{  
      $data['val']=$this->input->post('del');
	  $this->load->view('accounts/del_multi_property',$data);
	}
	
	public function delete(){
		
	$data=$this->input->post('vel');
	foreach($data as $id)
	{
	$query1=$this->db->query("SELECT fname FROM image where pid=$id;");
	$ro=$query1->result_array();
	foreach($ro as $row){
	$fname=$row['fname'];
	}
	if($fname == 'no.jpg'){echo '';}else{unlink("savefiles/$fname"); unlink("thumbs/$fname");}
	$query2=$this->db->query("DELETE FROM properties where id=$id;");
	$query3=$this->db->query("DELETE FROM image where pid=$id;");
	}
	if($query2){

		$this->session->set_flashdata('del','* Selected Property deleted');
	     redirect('users_properties');
    //header ("Location: ../users_properties.php?a=kii");
	}
	else{
		$this->session->set_flashdata('server','* Server busy please try later');
	redirect('users_properties');
	//header ("Location: ../admin_properties.php?a=qne");
	}
	}
}
