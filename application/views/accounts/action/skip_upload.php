<?php
	require_once('jcode.php');
	$run->db_open();
	$pid=mysql_real_escape_string($_REQUEST['id']);
	$query=mysql_query("INSERT INTO image(`pid`,`fname`)VALUES('$pid','no.jpg')");

	
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
   
    mail($to, $subject, $message, $headers);
	header ("Location: ../manage_properties.php?a=kie");

?>