<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_updates extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_updates_mod');

	}
	public function index()
	{  
      $data['query']=$this->manage_updates_mod->get_update();
	  $this->load->view('accounts/manage_updates',$data);
	}
	
	
	
	
	//////////////////////////////////////////////add_updates
	public function add_updates(){
		
	$type=$this->input->post('type');
	$msg=$this->input->post('msg');
	$url=$this->input->post('url');
	
	$date=date('d-m-Y');
	
	if(empty($type)){
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_updates");
		//header ("Location: ../manage_updates.php?a=kii");
	} 
	else
	{
		if($type == 1)
		{
			if(empty($msg) || $msg == 'Property Updates'){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=kii");
			} 
			else
			{
				$query=$this->db->query("INSERT INTO updates(`msg`,`type`,`date`)VALUES('$msg','text','$date');");
				if($query){
					$this->session->set_flashdata('one','* One Message added');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=ki9");
				}
				else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=qne");
				}
			}
		}
		
		else
		{
			if(empty($msg) || empty($url) || $msg == 'Property Updates' || $url == 'Url'){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=kii");
			}
			else
			{
				$query=$this->db->query("INSERT INTO updates(`msg`,`type`,`date`,`link`)VALUES('$msg','link','$date','$url');");
				if($query){
					$this->session->set_flashdata('one','* One Message added');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=ki9");
				}
				else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_updates");
				//header ("Location: ../manage_updates.php?a=qne");
				}
			}
		}
			
	}
	}
	
	public function view_update(){
		$id=$this->uri->segment(3);
		$data['ro']=$this->manage_updates_mod->view($id);
		 $this->load->view('accounts/view_update',$data);
	}
	
		public function edit_update(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['ro']=$this->manage_updates_mod->edit($id);
		 $this->load->view('accounts/edit_update',$data);
	}
	
	/////////////////////////////////////////////edit action
	public function edit_action(){

	$type=$this->input->post('type');
	$id=$this->input->post('id');
	$msg=$this->input->post('msg');
	$url=$this->input->post('url');
	
	if($type == 'text')
	{
		if(empty($msg)){
        	$this->session->set_flashdata('all','* All fields are required');
		    redirect("manage_updates/edit_update/$id");
		//header ("Location: ../edit_update.php?a=kii&b=$id");
		}
		else
		{
			$query=$this->db->query("UPDATE updates SET msg='$msg' where id=$id");
			if($query){
				$this->session->set_flashdata('new','* New details Updated');
		        redirect("manage_updates/edit_update/$id");
			//header ("Location: ../edit_update.php?a=ki9&b=$id");
			}
			else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_updates/edit_update/$id");
			//header ("Location: ../edit_update.php?a=qne&b=$id");
			}
		}
	}
	
	else
	{
		if(empty($msg) || empty($url)){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_updates/edit_update/$id");
			//header ("Location: ../edit_update.php?a=kii&b=$id");
		}
		else
		{
			$query=$this->db->query("UPDATE updates SET msg='$msg',link='$url' where id=$id");
			if($query){
					$this->session->set_flashdata('new','* New details Updated');
		        redirect("manage_updates/edit_update/$id");
			//header ("Location: ../edit_update.php?a=ki9&b=$id");
			}
			else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_updates/edit_update/$id");
			//header ("Location: ../edit_update.php?a=qne&b=$id");
			}
		}
	} 
	}
	
	public function delete(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['msg']=$this->manage_updates_mod->delete($id);
		$this->load->view('accounts/del_update',$data);
	}
	
	public function del_action(){

	$id=$this->input->get('id');
	$query=$this->db->query("DELETE FROM updates where id=$id");
	if($query){
		$this->session->set_flashdata('del','* One Message Deleted');
		redirect("manage_updates");
   // header ("Location: ../manage_updates.php?a=1ji");
	}
	else{
		$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_updates");
	//header ("Location: ../manage_updates.php?a=qne");
	}
		
		
	}
	
}
?>