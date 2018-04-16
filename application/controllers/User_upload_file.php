<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_upload_file extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();

	}
	public function index()
	{  
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
	  
   $page=$this->input->post('page');
   if($page == 1) {$page =site_url().'add_image'; $page1='manage_properties.php';}
   if($page == 2) {$page ='add_image1.php'; $page1='admin_properties.php';}
   if($page == 3) {$page ='update_image.php'; $page1='edit_property.php';}
   // Configuration - Your Options
   $allowed_filetypes = array('.jpg','.png','.gif'); // These will be the types of file that will pass the validation.
   $max_filesize = 20072000; // Maximum filesize in BYTES (currently 0.5MB).
    $upload_path ='savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
   //chmod($upload_path, 0777);
	$id = $this->input->post('id');
	$title = $this->input->post('tit');
   $file = basename($_FILES['userfile']['name']); // Get the name of the file (including file extension).
   $filename = $id.$title.$file;
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
	   echo 'not allow';
     //header("Location: $page?a=i11"); #die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
	   echo 'Your image to large';
      //header("Location: $page?a=s11"); #die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
	   echo 'chmod error';
     // header("Location: $page?a=d11"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path.$filename))
   {
	   //$type = $_FILES['userfile']['type'];
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
	   
	   $query=$this->db->query("INSERT INTO image(`pid`,`fname`,`thumbs`)VALUES('$pid','$filename','1');");
	   
	   //mail function
	   ////////////////////////////////////////////////////////////////////
    }
	$this->session->set_flashdata('success','Your Image Uploaded successfully');
	redirect('add_image');
	}
}




