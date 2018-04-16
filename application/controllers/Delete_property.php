<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_property extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('delete_property_mod');

	}
	public function index()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
      $data['tit']=$this->delete_property_mod->tit($id);
	  $this->load->view('accounts/del_property',$data);
	}
	public function delete()
	{
    $id=$this->input->get('id');
	$query1=$this->db->query("SELECT fname FROM image where pid=$id;");
	$ro=$query1->result_array();
	foreach($ro as $row){
	$fname=$row['fname'];
	}
	if($fname == 'no.jpg'){echo '';}else{unlink("savefiles/$fname"); unlink("thumbs/$fname");}
	$query2=$this->db->query("DELETE FROM properties where id=$id;");
	$query3=$this->db->query("DELETE FROM image where pid=$id;");
	if($query2){
	$this->session->set_flashdata('del','* One Property deleted');
	redirect('manage_properties');
      //header ("Location: ../manage_properties.php?a=kii");
	}
	else{
	$this->session->set_flashdata('server','* Server busy please try later');
	redirect('manage_properties');
	//header ("Location: ../manage_properties.php?a=qne");
	}
    }
}
