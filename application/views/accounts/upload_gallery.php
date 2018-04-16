<?php require_once('action/jcode.php');
	  $run->dates();
	  $run->db_open();
	  $pid=mysql_real_escape_string($_REQUEST['pid']);
	  $tit=mysql_real_escape_string($_REQUEST['tit']);
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
		$run->db_close();
		header("Location: add_gallery.php?a=kii&i=$pid");
	}
	else
	{
	   // Configuration - Your Options
	   $allowed_filetypes = array('.jpg','.png','.gif'); // These will be the types of file that will pass the validation.
	   $max_filesize = 10072000; // Maximum filesize in BYTES (currently 0.5MB).
	   $upload_path = 'savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
	   //chmod($upload_path, 0777);
	   $title = $_REQUEST['title'];
	   $file = basename($_FILES['userfile']['name']); // Get the name of the file (including file extension).
	   $filename = 'f'.$pid.$title.$file;
	   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
	 
	   // Check if the filetype is allowed, if not DIE and inform the user.
	   if(!in_array($ext,$allowed_filetypes))
		 header("Location: add_gallery.php?a=i11&i=$pid"); #die('The file you attempted to upload is not allowed.');
	 
	   // Now check the filesize, if it is too large then DIE and inform the user.
	   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		  header("Location: add_gallery.php?a=s11&i=$pid"); #die('The file you attempted to upload is too large.');
	 
	   // Check if we can upload to the specified path, if not DIE and inform the user.
	   if(!is_writable($upload_path))
		  header("Location: add_gallery.php?a=d11&i=$pid"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
	 
	   // Upload the file to your specified path.
	   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
	   {
		   make_thumb("savefiles/$filename","thumbs/$filename",100,90);
		   $run->db_open();
		   $query=mysql_query("INSERT INTO gallery(`pid`,`fname`,`tit`,`date`)VALUES('$pid','$filename','$tit','$date');"); 
		   $run->db_close(); 
		   header("Location: add_gallery.php?a=k10&i=$pid");
		   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
	   }    
	   else header("Location: add_gallery.php?a=e12&i=$pid");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
	}
 
?>