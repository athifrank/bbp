<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_documents_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('property_documents_admin_mod');

	}
	public function index()
	{  
      $data['query']=$this->property_documents_admin_mod->get_pro();
	  $this->load->view('accounts/property_documents',$data);
	}
	//////////////////////////////////////////////////////////////////////////////////////upload doc
	public function upload_doc(){
	  $date=date('d-m-Y');
	  $tit=$this->input->post('tit');
	
	if(empty($tit) || $tit == "Document Title" || empty($_FILES['userfile']) )
	{
		$this->session->set_flashdata('all','* All fields are required');
		redirect("property_documents_admin");
		//header("Location: property_documents.php?a=kii");
	}
	else
	{
	   // Configuration - Your Options
	   $allowed_filetypes = array('.doc,.docx,.xls,.pdf'); // These will be the types of file that will pass the validation.
	   $max_filesize = 20072000; // Maximum filesize in BYTES (currently 0.5MB).
	   $upload_path = 'uploads/documents/'; // The place the files will be uploaded to (currently a 'files' directory).
	   //chmod($upload_path, 0777);
	
	   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
	   echo $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
	 
	   // Check if the filetype is allowed, if not DIE and inform the user.
	   if(!in_array($ext,$allowed_filetypes))
		   echo 'upload file not allowed';
		 //header("Location: property_documents.php?a=i11"); #die('The file you attempted to upload is not allowed.');
	 
	   // Now check the filesize, if it is too large then DIE and inform the user.
	   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		   echo 'file To large';
		  //header("Location: property_documents.php?a=s11"); #die('The file you attempted to upload is too large.');
	 
	   // Check if we can upload to the specified path, if not DIE and inform the user.
	   if(!is_writable($upload_path))
		   echo 'Please chmod to 777';
		  //header("Location: property_documents.php?a=d11"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
	 
	   // Upload the file to your specified path.
	   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
	   {
		   $this->db->query("INSERT INTO documents(`tit`,`fname`,`date`)VALUES('$tit','$filename','$date');"); 
		   $this->session->set_flashdata('one','*One new document added to the list');
		   redirect("property_documents_admin");
		   //header("Location: property_documents.php?a=k10");
		   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
	   }    
	   else {
		   $this->session->set_flashdata('err','Error: check the file and try again!');
		   redirect("property_documents_admin");
		   //header("Location: property_documents.php?a=e12");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
	   }
	}
	}
	////////////////////////////////////////////////////////////////////////////edit_action
	public function edit_document(){
		$id=$this->uri->segment(3);
		$data['ro']=$this->property_documents_admin_mod->edit($id);
		$this->load->view('accounts/edit_document',$data);
	}
	
	public function edit_action(){
	$tit=$this->input->post('tit');
	$id=$this->input->post('id');
	
	if(empty($tit)){
	$this->session->set_flashdata('all','* All fields are required');
	redirect("property_documents_admin/edit_document/$id");	
	 //header ("Location: ../edit_document.php?a=kii&b=$id");
	}
	else
	{
		$query=$this->db->query("UPDATE documents SET tit='$tit' where id=$id");
		if($query){
		
		$this->session->set_flashdata('new','* New details Updated');
		redirect("property_documents_admin");		
		//header ("Location: ../edit_document.php?a=ki9&b=$id");
		}
		else{
		
		$this->session->set_flashdata('server','* server busy try again later');
		redirect("property_documents_admin/edit_document/$id");		
		//header ("Location: ../edit_document.php?a=qne&b=$id");
		}
	}
	}
	///////////////////////////////////////////////////////////////////////////////delete action
	public function del_document(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['msg']=$this->property_documents_admin_mod->delete($id);
		$this->load->view('accounts/del_document',$data);
	}
	
	public function del_action(){

	$id=$this->input->get('id');
	$query1=$this->db->query("SELECT fname FROM documents where id='$id'");
	$ro=$query1->result_array();
	foreach($ro as $row){
			$fname=$row['fname'];
	}
	unlink("uploads/documents/$fname");
	$query2=$this->db->query("DELETE FROM documents where id='$id'");
	if($query2){
		$this->session->set_flashdata('del','One document deleted from the list');
		redirect("property_documents_admin");
    //header ("Location: ../property_documents.php?a=kie");
	}
	else{
		
		$this->session->set_flashdata('server','* server busy try again later');
		redirect("property_documents_admin");	
	//header ("Location: ../property_documents.php?a=qne");
	}
	}
	
}
