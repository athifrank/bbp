<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_news extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_news_mod');

	}
	public function index()
	{  
      $data['query']=$this->manage_news_mod->get_update();
	  $this->load->view('accounts/manage_news',$data);
	}
	
	
	
	
	//////////////////////////////////////////////add_updates
	public function add_news(){
		
	$type=$this->input->post('type');
	$msg=$this->input->post('msg');
	$url=$this->input->post('url');
	
	$date=date('d-m-Y');
	
	if(empty($type)){
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_news");
		//header ("Location: ../manage_updates.php?a=kii");
	} 
	else
	{
		if($type == 1)
		{
			if(empty($msg) || $msg == 'Property news'){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=kii");
			} 
			else
			{
				$query=$this->db->query("INSERT INTO news(`msg`,`type`,`date`)VALUES('$msg','text','$date');");
				if($query){
					$this->session->set_flashdata('one','* One Message added');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=ki9");
				}
				else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=qne");
				}
			}
		}
		
		else
		{
			if(empty($msg) || empty($url) || $msg == 'Property news' || $url == 'Url'){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=kii");
			}
			else
			{
				$query=$this->db->query("INSERT INTO news(`msg`,`type`,`date`,`link`)VALUES('$msg','link','$date','$url');");
				if($query){
					$this->session->set_flashdata('one','* One Message added');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=ki9");
				}
				else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_news");
				//header ("Location: ../manage_updates.php?a=qne");
				}
			}
		}
			
	}
	}
	
	public function view_news(){
		$id=$this->uri->segment(3);
		$data['ro']=$this->manage_news_mod->view($id);
		 $this->load->view('accounts/view_news',$data);
	}
	
		public function edit_news(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['ro']=$this->manage_news_mod->edit($id);
		 $this->load->view('accounts/edit_news',$data);
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
		    redirect("manage_news/edit_news/$id");
		//header ("Location: ../edit_update.php?a=kii&b=$id");
		}
		else
		{
			$query=$this->db->query("UPDATE news SET msg='$msg' where id=$id");
			if($query){
				$this->session->set_flashdata('new','* New details Updated');
		        redirect("manage_news/edit_news/$id");
			//header ("Location: ../edit_update.php?a=ki9&b=$id");
			}
			else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_news/edit_news/$id");
			//header ("Location: ../edit_update.php?a=qne&b=$id");
			}
		}
	}
	
	else
	{
		if(empty($msg) || empty($url)){
				$this->session->set_flashdata('all','* All fields are required');
		        redirect("manage_news/edit_news/$id");
			//header ("Location: ../edit_update.php?a=kii&b=$id");
		}
		else
		{
			$query=$this->db->query("UPDATE news SET msg='$msg',link='$url' where id=$id");
			if($query){
					$this->session->set_flashdata('new','* New details Updated');
		        redirect("manage_news/edit_news/$id");
			//header ("Location: ../edit_update.php?a=ki9&b=$id");
			}
			else{
					$this->session->set_flashdata('server','* Server busy please try later');
		        redirect("manage_news/edit_news/$id");
			//header ("Location: ../edit_update.php?a=qne&b=$id");
			}
		}
	} 
	}
	
	public function delete(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['msg']=$this->manage_news_mod->delete($id);
		$this->load->view('accounts/del_news',$data);
	}
	
	public function del_action(){

	$id=$this->input->get('id');
	$query=$this->db->query("DELETE FROM news where id=$id");
	if($query){
		$this->session->set_flashdata('del','* One Message Deleted');
		redirect("manage_news");
   // header ("Location: ../manage_updates.php?a=1ji");
	}
	else{
		$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_news");
	//header ("Location: ../manage_updates.php?a=qne");
	}
		
		
	}
	
}
?>