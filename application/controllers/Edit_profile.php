<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('edit_profile_mod');

	}
	public function index()
	{  
     
      $data['pro']=$this->edit_profile_mod->edit_pro();
	  $this->load->view('accounts/edit_profile',$data);
	}
	public function edit()
	{  

	$id=$_SESSION['id'];
	$add=$this->input->post('add');
	$city=$this->input->post('city');
	$coun=$this->input->post('coun');
	$zip=$this->input->post('zip');
	$mobi=$this->input->post('mobi');
	$cname=$this->input->post('cname');
	$website=$this->input->post('url');
	
	if(empty($add) || empty($city) ||  empty($coun) || empty($zip) || empty($mobi))
	{
		$this->session->set_flashdata('all','* All fields are required');
		$this->index();
		//header ("Location: ../edit_user.php?a=1i0&b=$id");
	}
	else
	{	
		$query=$this->db->query("UPDATE users SET `add`='$add',`city`='$city',`coun`='$coun',`zip`='$zip',`mobi`='$mobi',
	`cname`='$cname',`url`='$website' where id=$id");
	
		if($query){
		$this->session->set_flashdata('success','* Profile updated Successfully');
		redirect('update_profile');
		//header ("Location: ../view_profile.php?a=k10");
		}
		else{
		$this->session->set_flashdata('server','* Server busy please try later');
		redirect('update_profile');
		//header ("Location: ../view_profile.php?a=qne");
		}
	}
	}

}
?>