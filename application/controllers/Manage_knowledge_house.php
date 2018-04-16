<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_knowledge_house extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_knowledge_house_mod');

	}
	public function index()
	{  
      $data['query']=$this->manage_knowledge_house_mod->get_house();
	  $this->load->view('accounts/manage_knowledge_house',$data);
	}
	
	public function add_house()
	{  
      //$data['query']=$this->manage_knowledge_house_mod->get_house();
	  $this->load->view('accounts/add_knowledge_house');
	}
	
	public function view_knowledge()
	{  
	$id=$this->uri->segment(3);
      $data['ro']=$this->manage_knowledge_house_mod->view($id);
	  $this->load->view('accounts/view_knowledge',$data);
	}
	
	public function edit_knowledge()
	{  
	$id=$this->uri->segment(3);
      $data['ro']=$this->manage_knowledge_house_mod->edit($id);
	  $this->load->view('accounts/edit_knowledge',$data);
	}
	
	public function edit_action(){

	$id=$this->input->post('id');
	$content=$this->input->post('content');
	$title=$this->input->post('title');
	$update_date=$this->input->post('update_date');
	$discription=$this->input->post('discription');
	
	if(empty($id) || empty($content) || empty($title) || empty($update_date) || empty($discription))
	{
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_knowledge_house/edit_knowledge/$id");
		//header ("Location: ../edit_knowledge.php?a=1i0&b=$id");
	}
	else
	{	
		$query=$this->db->query("UPDATE knowledge_house SET `content`='$content',`title`='$title',`update_date`='$update_date',`discription`='$discription' where id=$id");
	
		if($query){
			$this->session->set_flashdata('new','* New details Updated');
		redirect("manage_knowledge_house/edit_knowledge/$id");
		//header ("Location: ../edit_knowledge.php?a=kii&b=$id");
		}
		else{
			$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_knowledge_house/edit_knowledge/$id");
		//header ("Location: ../edit_knowledge.php?a=qne&b=$id");
		}
	}
	}
	
	public function del_knowledge()
	{  
	$id=$this->uri->segment(3);
	$data['id']=$id;
      $data['title']=$this->manage_knowledge_house_mod->delete($id);
	  $this->load->view('accounts/del_knowledge',$data);
	}
	
	public function del_action(){

	$id=$this->input->get('id');
	
	$result = $this->db->query("SELECT * from knowledge_house where id=$id"); 
		  $ro=$result->result_array();
		  foreach($ro as $row)
		  {
		 $img=$row['img'];	
		  }
		  
	$query=$this->db->query("DELETE FROM knowledge_house where id=$id");
	
	unlink("$img");

		if($query){
			$this->session->set_flashdata('one','* One Knowledge House Removed');
		redirect("manage_knowledge_house");
		//header ("Location: ../edit_knowledge.php?a=kii&b=$id");
		}
		else{
			$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_knowledge_house");
		//header ("Location: ../edit_knowledge.php?a=qne&b=$id");
		}
	}
    
	
	public function upload_house(){

		$select_folder1="Knowledge_House/";
		$title=$this->input->post('title');
		$content=$this->input->post('content');
		$discription=$this->input->post('discription');

		//$s = mktime(date("G") + 12); 
		$dat=date('Y-m-d');
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$ex1=explode(".", $_FILES["file"]["name"]);
		$extension = end($ex1);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 90000000000)
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
		   

			if (file_exists("$select_folder1/" . $_FILES["file"]["name"]))
			  {
			  echo $_FILES["file"]["name"] . " already exists. ";
			  }
			else
			  {
			  move_uploaded_file($_FILES["file"]["tmp_name"],
			  $select_folder1 . $_FILES["file"]["name"]);
			 // echo "Stored in: " . "$select_folder1" . $_FILES["file"]["name"];
			  }
			}
			
			
			$img=$select_folder1. $_FILES["file"]["name"];
			$result = $this->db->query("INSERT INTO knowledge_house(`title`,`content`,`update_date`,`img`,`discription`) values ('$title','$content','$dat','$img','$discription')");
			$this->session->set_flashdata('success','Knowledge House Added Succesfully');
			$this->add_house();
			//header("location:add_knowledge_house.php?msg=Knowledge House Added Succesfully");
		  }
		  		  
		else
		  {
			$this->session->set_flashdata('img','Image Uploaded Failed');
			$this->add_house();  
		 //header("location:upload_image.php?img=Image Uploaded Failed");
		  }
		  
			}
	
}
