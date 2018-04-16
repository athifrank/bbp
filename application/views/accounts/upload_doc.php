<?php require_once('action/jcode.php');
	  $run->dates();
	  $run->db_open();
	  $tit=mysql_real_escape_string($_REQUEST['tit']);
	
	if(empty($tit) || $tit == "Document Title" || empty($_FILES['userfile']) )
	{
		$run->db_close();
		header("Location: property_documents.php?a=kii");
	}
	else
	{
	   // Configuration - Your Options
	   $allowed_filetypes = array('.doc,.docx,.xls,.pdf'); // These will be the types of file that will pass the validation.
	   $max_filesize = 10072000; // Maximum filesize in BYTES (currently 0.5MB).
	   $upload_path = 'savefiles/'; // The place the files will be uploaded to (currently a 'files' directory).
	   //chmod($upload_path, 0777);
	
	   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
	   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
	 
	   // Check if the filetype is allowed, if not DIE and inform the user.
	   if(!in_array($ext,$allowed_filetypes))
		 header("Location: property_documents.php?a=i11"); #die('The file you attempted to upload is not allowed.');
	 
	   // Now check the filesize, if it is too large then DIE and inform the user.
	   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		  header("Location: property_documents.php?a=s11"); #die('The file you attempted to upload is too large.');
	 
	   // Check if we can upload to the specified path, if not DIE and inform the user.
	   if(!is_writable($upload_path))
		  header("Location: property_documents.php?a=d11"); #die('You cannot upload to the specified directory, please CHMOD it to 777.');
	 
	   // Upload the file to your specified path.
	   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
	   {
		   $run->db_open();
		   mysql_query("INSERT INTO documents(`tit`,`fname`,`date`)VALUES('$tit','$filename','$date');"); 
		   $run->db_close(); 
		   header("Location: property_documents.php?a=k10");
		   //echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
	   }    
	   else header("Location: property_documents.php?a=e12");//echo 'There was an error during the file upload. Please try again.'; // It failed :(.
	}
 
?>