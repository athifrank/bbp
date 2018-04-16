<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_users_mod');

	}
	public function index()
	{  
      $data['query']=$this->manage_users_mod->get_user();
	  $this->load->view('accounts/manage_users',$data);
	}
	
	public function view_user()
	{  
	  $id=$this->uri->segment(3);
      $data['ro']=$this->manage_users_mod->view($id);
	  $this->load->view('accounts/view_user',$data);
	}
	public function edit_user()
	{  
	  $id=$this->uri->segment(3);
      $data['ro']=$this->manage_users_mod->edit($id);
	  $this->load->view('accounts/edit_user',$data);
	}
	
	public function edit_action(){
		

	$name=$this->input->post('name');
	$eid=$this->input->post('eid');
	$add=$this->input->post('add');
	$city=$this->input->post('city');
	$coun=$this->input->post('coun');
	$zip=$this->input->post('zip');
	$mobi=$this->input->post('mobi');
	$cname=$this->input->post('cname');
	$website=$this->input->post('url');
	$id=$this->input->post('id');
	
	if(empty($name) || empty($eid) || empty($add) || empty($city) ||  empty($coun) || empty($zip) || empty($mobi))
	{
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_users/edit_user/$id");
		//header ("Location: ../edit_user.php?a=1i0&b=$id");
	}
	else
	{	
		$query=$this->db->query("UPDATE users SET `name`='$name',`eid`='$eid',`add`='$add',`city`='$city',`coun`='$coun',`zip`='$zip',`mobi`='$mobi',
	`cname`='$cname',`url`='$website' where id='$id'");
	
		if($query){
			$this->session->set_flashdata('new','* New details Updated');
		redirect("manage_users/edit_user/$id");
		//header ("Location: ../edit_user.php?a=kii&b=$id");
		}
		else{
			$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_users/edit_user/$id");
		//header ("Location: ../edit_user.php?a=qne&b=$id");
		}
	}
	}
	
	public function del_user()
	{  
	  $id=$this->uri->segment(3);
	  $data['id']=$id;
      $data['name']=$this->manage_users_mod->delete($id);
	  $this->load->view('accounts/del_user',$data);
	}
	
	public function del_action(){

	 $id=$this->input->get('id');
	$query=$this->db->query("DELETE FROM users where id='$id'");
	if($query){
		$this->session->set_flashdata('one','* One User details Removed');
		redirect("manage_users");
    //header ("Location: ../manage_users.php?a=kii");
	}
	else{
		$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_users");
	//header ("Location: ../manage_users.php?a=qne");
	}
	}

}
