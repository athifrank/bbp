<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skip_upload1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('add_image_mod');

	}
	public function index()
	{  
     $pid=$this->uri->segment(3);
	 	 $sql=$this->db->query("SELECT fname FROM image WHERE image.pid='$pid'");
	 $ro=$sql->result_array();
	 foreach($ro as $row){
		   $fname=$row['fname'];
	 }
	  if(empty($fname)){
	$query=$this->db->query("INSERT INTO image(`pid`,`fname`)VALUES('$pid','no.jpg')");
	$this->session->set_flashdata('new','* One New Property added');
	redirect('admin_properties');
	  }
	  else{
	$this->session->set_flashdata('new','* One New Property added');
	redirect('admin_properties');
	  }
	}

}
?>