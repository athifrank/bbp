<?php require_once('action/jcode.php');
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
   if($page == 1) {$page ='add_image.php'; $page1='manage_properties.php';}
   if($page == 2) {$page ='add_image1.php'; $page1='admin_properties.php';}
   if($page == 3) {$page ='update_image.php'; $page1='edit_property.php';}
   // Configuration - Your Options
   $allowed_filetypes = array('.jpg','.png','.gif'); // These will be the types of file that will pass the validation.
   $max_filesize = 10072000; // Maximum filesize in BYTES (currently 0.5MB).
   $upload_path = 'savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
   //chmod($upload_path, 0777);
	$id = $_REQUEST['id'];
	$title = $_REQUEST['tit'];
   $file = basename($_FILES['userfile']['name']); // Get the name of the file (including file extension).
   $filename = $id.$title.$file;
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
     header("Location: $page?a=i11"); #die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      header("Location: $page?a=s11"); #die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      header("Location: $page?a=d11"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
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
	   $run->db_open();
	    $pid=mysql_real_escape_string($_REQUEST['id']);
	   
	   $query=mysql_query("INSERT INTO image(`pid`,`fname`,`thumbs`)VALUES('$pid','$filename','1');");
	   
	   
	   
	   $query_email=mysql_query("SELECT uid FROM properties where id='$pid';");
	   
	   $row = mysql_fetch_array($query_email);

	   $eid1=$row['uid'];
	   
	   $query_email1=mysql_query("SELECT * FROM users where id='$eid1';");
	   $row1 = mysql_fetch_array($query_email1);
	   $eid=$row1['eid'];
	   $ename=$row1['name'];
	   $run->db_close();
	   $to    = $eid;
	   $subject  = 'Bangalore Best Property';
	   $from="contact@bangalorebestproperty.com";
	   $headers = "From: " . $from . "\r\n";
	   $headers .= "Reply-To: ". $from . "\r\n";
       $headers .= "mailed-by: ". $from . "\r\n";
	   $headers .= "MIME-Version: 1.0\r\n";
	   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       //$url='http://bangalorebestproperty.com/accounts/view_property.php?b='.$pid;
    $message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>Thanks for Listing your property in Bengalore Best Property.<br /><br />
	You can view the property details at http://bangalorebestproperty.com/accounts/view_property.php?b='.$pid.' <br /><br />
	For any informations/clarifications contact us at contact@bangalorebestproperty.com <br /><br />
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';	   
	    //e-Mail Notifiction
	   mail($to, $subject, $message, $headers);
	   header("Location: $page1?a=kie");
	  
	   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
   }    
   else header("Location: $page?a=e12");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
 
?>