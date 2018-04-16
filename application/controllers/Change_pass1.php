<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pass1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('view_property_mod');

	}
	public function index()
	{  

	  $this->load->view('accounts/change_pass1');
	}
	
	public function cpass(){
		
	$query=$this->db->query("select * from admin");
	$ro=$query->result_array();
	foreach($ro as $row){
	 $chk=$row['pass'];
	}
	
	$oldpassword=$this->input->post('opword');
	$newpassword=$this->input->post('npword');
	$cnewpassword=$this->input->post('cnpword');
	
	$len=strlen($newpassword);
	
	if (empty($oldpassword) || empty($newpassword) || empty($cnewpassword)){
	$this->session->set_flashdata('all','* All fields are required');
    redirect('change_pass1');
	//header ("Location: ../change_pass.php?a=1i0");
	}
	else if($chk !=sha1($oldpassword)){
	$this->session->set_flashdata('old','* Old password mismatch');
    redirect('change_pass1');
	//header ("Location: ../change_pass.php?a=1mi&b=$chk");
	}
	
	else if($newpassword != $cnewpassword ){
	$this->session->set_flashdata('newm','* New password mismatch');
    redirect('change_pass1');
	//header ("Location: ../change_pass.php?a=1ji");
	}
	
	else if($len < 6){
	$this->session->set_flashdata('minimum','* Minimum password length is 6');
    redirect('change_pass1');
	//header ("Location: ../change_pass.php?a=2ji");
	}
	
	else
	{
		$new=sha1($newpassword);
		$query=$this->db->query("UPDATE admin SET pass='$new';");
		if($query){
		$this->session->set_flashdata('newu','* New password Updated');
        redirect('change_pass1');
		//header ("Location: ../change_pass.php?a=kii"); 
		}
		else{
		$this->session->set_flashdata('server','* Server busy please try later');
        redirect('change_pass1');	
		//header ("Location: ../change_pass.php?a=qne"); 
		}
	}
	}

}
?>