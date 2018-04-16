<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_image extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('update_image_mod');

	}
	public function index()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
	   //$data['loc_list']=$this->edit_property_mod->loc_list();
      //$data['result']=$this->edit_property_mod->edit_pro($id);
	  $this->load->view('accounts/update_image',$data);
	}
	
	public function update_img(){
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
	 function make_thumb_png($src,$dest,$desired_width,$desired_height)
	  {
		$source_image = imagecreatefromPNG($src);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
		imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
		imagePNG($virtual_image,$dest);
	  }
	  function make_thumb_gif($src,$dest,$desired_width,$desired_height)
	  {
		$source_image = imagecreatefromGIF($src);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
		imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
		imageGIF($virtual_image,$dest);
	  }
	
   $page=$_REQUEST['page'];
   if($page == 1) {$page ='update_image.php'; $page1='edit_property.php';}
   if($page == 2) {$page ='update_image1.php'; $page1='edit_property_admin.php';}
   // Configuration - Your Options
   $allowed_filetypes = array('.jpg','.png','.gif'); // These will be the types of file that will pass the validation.
   $max_filesize = 10072000; // Maximum filesize in BYTES (currently 0.5MB).
   $upload_path = 'savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
   //chmod($upload_path, 0777);
  $pid = $this->input->post('id');
  $query=$this->db->query("SELECT tit FROM properties WHERE id='$pid' ORDER BY id DESC LIMIT 1");
  $row1=$query->result_array();
  foreach($row1 as $row){  
  $title = $row['tit'];
  }
   $file = basename($_FILES['userfile']['name']); // Get the name of the file (including file extension).
   $filename = $pid.$title.$file;
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
     echo 'not allow';//header("Location: $page?a=i11"); #die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
        echo 'Your file is to large';//header("Location: $page?a=s11"); #die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      echo 'chmod';//header("Location: $page?a=d11"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
   {
	   if($ext == '.jpg')
		{
		make_thumb("savefiles/$filename","thumbs/$filename",100,90);
		}
		if($ext == '.png')
		{
		make_thumb_png("savefiles/$filename","thumbs/$filename",100,90);
		}
		if($ext == '.gif')
		{
		make_thumb_gif("savefiles/$filename","thumbs/$filename",100,90);
		}
	   $pid=$this->input->post('id');
	   $query1=$this->db->query("SELECT fname FROM image where pid=$pid;");
	   $ro=$query1->result_array();
	   foreach($ro as $row){
		   	   $fname=$row['fname'];
	   }
	   if($fname != 'no.jpg'){unlink("savefiles/$fname"); unlink("thumbs/$fname");}
	   $this->db->query("DELETE FROM image where pid=$pid;"); 
	   $this->db->query("INSERT INTO image(`pid`,`fname`,`thumbs`)VALUES('$pid','$filename','1');"); 

	   header("Location: ../edit_property/index/$pid");
	   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
   }    
   else   echo 'Please try again';          //header("Location: $page?a=e12");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
 
	}

}
?>