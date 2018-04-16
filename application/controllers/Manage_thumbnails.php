<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_thumbnails extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('manage_thumbnails_mod');

	}
	public function index()
	{ 
     $data['query']=$this->manage_thumbnails_mod->get_thumb();
	 $this->load->view('accounts/manage_thumbnails',$data);
	}
	///////////////////////////////////////////////////////////////////////////////add thumbnail
	public function add_thumbnails(){

	$pid=$this->input->post('pid');

	if( $pid == null || $pid == 'Enter Property Id'){
		$this->session->set_flashdata('all','* All the fields are required');
		redirect("manage_thumbnails");
		//header ("Location: ../manage_thumbnails.php?a=kii");
	}
	else
	{
		$query1=$this->db->query("SELECT COUNT(pid),thumbs FROM image WHERE pid=$pid;");
		$ro = $query1->result_array();
		foreach($ro as $row){
		$check=$row['COUNT(pid)'];
		$check1=$row['thumbs'];
		}
		if($check == 0){
		$this->session->set_flashdata('invalid','* Invalid property id provided');
		redirect("manage_thumbnails");
			//header ("Location: ../manage_thumbnails.php?a=ki1");
		}
		elseif($check1 == 2){
		$this->session->set_flashdata('ex','* Property id already exits');
		redirect("manage_thumbnails");
			//header ("Location: ../manage_thumbnails.php?a=ki2");
		}
		else
		{
			$query=$this->db->query("UPDATE image SET thumbs='2' WHERE pid=$pid;");
			if($query){
				$this->session->set_flashdata('add','* One thumbnail added to the list');
		     redirect("manage_thumbnails");
			//header ("Location: ../manage_thumbnails.php?a=ki9");
			}
			else{
				$this->session->set_flashdata('server','* Server busy please try later');
		      redirect("manage_thumbnails");
			//header ("Location: ../manage_thumbnails.php?a=qne");
			}
		}
	}
		
	}
	
	public function del_thumbs()
	{ 
	$id=$this->uri->segment(3);
	$data['id']=$id;
     $data['name']=$this->manage_thumbnails_mod->delete($id);
	 $this->load->view('accounts/del_thumbs',$data);
	}
	
	public function del_action()
	{ 

	$id=$this->input->get('id');
	$query=$this->db->query("UPDATE image SET thumbs='1' WHERE id=$id;");
	if($query){
		$this->session->set_flashdata('one','* One thumbnail removed from the list');
		redirect("manage_thumbnails");
	//header ("Location: ../manage_thumbnails.php?a=1ji");
	}
	else{
		$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_thumbnails");
	//header ("Location: ../manage_thumbnails.php?a=qne");
	}
	}

}
?>