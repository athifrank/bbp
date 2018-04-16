<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_projects extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_projects_mod');

	}
	public function index()
	{  
	  $data['query']=$this->manage_projects_mod->get_pos();
	  $this->load->view('accounts/manage_projects',$data);
	}
	
	public function add_gallery()
	{  
	   $pid=$this->uri->segment(3);
	   $data['pid']=$pid;
	    $data['t']=$this->manage_projects_mod->get_name1($pid);
	  $data['tit']=$this->manage_projects_mod->get_name($pid);
	  $data['query']=$this->manage_projects_mod->get_thumb($pid);
	  $data['b']=$this->manage_projects_mod->get_banner($pid);
	  $this->load->view('accounts/add_gallery',$data);
	}
	
	public function upload_gallery(){
	  $date=date('d-m-Y');
	  $pid=$this->input->post('pid');
	  $tit=$this->input->post('tit');
	function make_thumb($src,$dest,$desired_width,$desired_height)
	{
	  /* read the source image */
	  $source_image = imagecreatefromjpeg($src);
	  $width = imagesx($source_image);
	  $height = imagesy($source_image);
	  
	  /* find the "desired height" of this thumbnail, relative to the desired width  */
	  #$desired_height = $desired_width ; #floor($height*($desired_width/$width));
	  
	  /* create a new, "virtual" image */
	  $virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	  
	  /* copy source image at a resized size */
	  imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	  
	  /* create the physical thumbnail image to its destination */
	  imagejpeg($virtual_image,$dest);
	}
	
	if(empty($tit) || $tit == "Title" || empty($_FILES['userfile']) )
	{
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_projects/add_gallery/$pid");
		//header("Location: add_gallery.php?a=kii&i=$pid");
	}
	else
	{
	   // Configuration - Your Options
	   $allowed_filetypes = array('.jpg','.png','.gif'); // These will be the types of file that will pass the validation.
	   $max_filesize = 20072000; // Maximum filesize in BYTES (currently 0.5MB).
	   $upload_path = 'savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
	   //chmod($upload_path, 0777);
	   $title = $this->input->post('title');
	   $file = basename($_FILES['userfile']['name']); // Get the name of the file (including file extension).
	   $filename = 'f'.$pid.$title.$file;
	   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
	 
	   // Check if the filetype is allowed, if not DIE and inform the user.
	   if(!in_array($ext,$allowed_filetypes))
		   echo 'Not allowed';
		 //header("Location: add_gallery.php?a=i11&i=$pid"); #die('The file you attempted to upload is not allowed.');
	 
	   // Now check the filesize, if it is too large then DIE and inform the user.
	   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		   echo 'File to large';
		  //header("Location: add_gallery.php?a=s11&i=$pid"); #die('The file you attempted to upload is too large.');
	 
	   // Check if we can upload to the specified path, if not DIE and inform the user.
	   if(!is_writable($upload_path))
		   echo 'chmod 777';
		  //header("Location: add_gallery.php?a=d11&i=$pid"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
	 
	   // Upload the file to your specified path.
	   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
	   {
		   make_thumb("savefiles/$filename","thumbs/$filename",100,90);
		   $query=$this->db->query("INSERT INTO gallery(`pid`,`fname`,`tit`,`date`)VALUES('$pid','$filename','$tit','$date');"); 
		   $this->session->set_flashdata('one','One new image added to the gallery');
		   redirect("manage_projects/add_gallery/$pid");
		   //header("Location: add_gallery.php?a=k10&i=$pid");
		   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
	   }    
	   else{
		    $this->session->set_flashdata('err','Error: check the file and try again!');
		   redirect("manage_projects/add_gallery/$pid");
		   //header("Location: add_gallery.php?a=e12&i=$pid");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
	   }
	}
 
	}
	
	public function default_thumb(){

	$crop=$this->input->post('crop');
	$pid=$this->input->post('id');
	
	if( empty($crop))
	{
		 $this->session->set_flashdata('select','*Select the thumbnail to update');
	    redirect("manage_projects/add_gallery/$pid");
		//header ("Location: ../add_gallery.php?a=dm3&i=$pid");
	}
	else
	{
		$query=$this->db->query("UPDATE fp SET thumbs='$crop' where pid=$pid;");
		 $this->session->set_flashdata('changed','<img src="'.base_url().'assets/images/star.gif"/> Default thumbnail changed');
		  redirect("manage_projects/add_gallery/$pid");
		//header ("Location: ../add_gallery.php?a=ki7&i=$pid");
	}
	}
	
	public function crop(){
		 $pid=$this->uri->segment(3);
         $data['pid']=$pid;		
		$this->load->view('accounts/crop',$data);
	}
	public function del_gallery(){
		 $gid=$this->uri->segment(3);
		 $pid=$this->uri->segment(4);
         $data['pid']=$pid;	
		 $data['gid']=$gid;	
         $data['name']=$this->manage_projects_mod->delete($gid);		 
		$this->load->view('accounts/del_gallery',$data);
	}
	
	public function del_action(){
		
	$id=$this->input->get('id');
	$i=$this->input->get('i');
	$query1=$this->db->query("SELECT fname FROM gallery where gid='$id'");
	$ro=$query1->result_array();
	foreach($ro as $row){		
	$fname=$row['fname'];	
	}
	unlink("savefiles/$fname");
	unlink("thumbs/$fname");
	$query2=$this->db->query("DELETE FROM gallery where gid='$id'");
	if($query2){
		$this->session->set_flashdata('del','One image deleted from the gallery');
		   redirect("manage_projects/add_gallery/$i");
    //header ("Location: ../add_gallery.php?a=kie&i=$i");
	}
	else{
		$this->session->set_flashdata('server','Server busy please try again later');
		   redirect("manage_projects/add_gallery/$i");
	//header ("Location: ../add_gallery.php?a=qne&i=$i");
	}
	}
	
	public function edit_project(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['ro']=$this->manage_projects_mod->edit($id);
		$this->load->view('accounts/edit_project',$data);
	}
	
	public function edit_action(){

	$tit=$this->input->post('tit');
	$loc=$this->input->post('loc');
	$ptype=$this->input->post('ptype');
	$text=$this->input->post('text');
	$pid=$this->input->post('pid');
	
	if( !empty($tit) || !empty($loc) || !empty($ptype) || !empty($text))
	{
		$tit = ucwords(strtolower($tit));
		$query=$this->db->query("UPDATE fp SET tit='$tit',loc='$loc',ptype='$ptype',text='$text' where pid=$pid;");
			$this->session->set_flashdata('up','Project Updated');
		   redirect("manage_projects/edit_project/$pid");
		//header ("Location: ../edit_project.php?a=kie&b=$pid");
	}
	else {
		$this->session->set_flashdata('server','server busy try again later');
		   redirect("manage_projects/edit_project/$pid");
		//header ("Location: ../edit_project.php?a=qne&b=$pid");
	}
	}
	
	public function del_project(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['name']=$this->manage_projects_mod->del_tit($id);
		$data['check']=$this->manage_projects_mod->del_check($id);
		$this->load->view('accounts/del_project',$data);
	}
	
	public function del_action1(){

	$id=$this->input->get('id');		
	$query=$this->db->query("DELETE FROM fp where pid=$id;");
	if($query){
		$this->session->set_flashdata('del','* One Project deleted from the list');
		   redirect("manage_projects");
    //header ("Location: ../manage_projects.php?a=kie");
	}
	else{
		$this->session->set_flashdata('server','server busy try again later');
		   redirect("manage_projects");
	//header ("Location: ../manage_projects.php?a=qne");
	}
		
	}
	

	
}
