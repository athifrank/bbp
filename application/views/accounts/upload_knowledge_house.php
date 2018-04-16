<?php

require_once('action/jcode.php'); 
$run->db_open();

$select_folder1="Knowledge_House/";
$title=$_POST['title'];
$content=$_POST['content'];
$discription=$_POST['discription'];

$s = mktime(date("G") + 12); 
$dat=date("Y/m/d", $s);
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
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
	$result = mysql_query("INSERT INTO knowledge_house(`title`,`content`,`update_date`,`img`,`discription`) values ('$title','$content','$dat','$img','$discription')") or die(mysql_error());
	header("location:add_knowledge_house.php?msg=Knowledge House Added Succesfully");
  }
  
  
else
  {
 header("location:upload_image.php?img=Image Uploaded Failed");
  }
  
   
?>
