<?php
 	require_once('jcode.php');
	$run->db_open();
	$mail=mysql_real_escape_string($_REQUEST['mail']);
	$run->db_close();
	if(empty($mail))
	{
		header ("Location: ../activation_mail.php?a=8i5");
	}
	else
	{
		$run->db_open();
		$query=mysql_query("SELECT COUNT(eid),eid,name,status FROM users WHERE eid LIKE '$mail'");
		$run->db_close();
		$row=mysql_fetch_array($query);
		$check=$row['COUNT(eid)'];
		$name=$row['name'];
		$mail=$row['eid'];
		$status =$row['status'];
		if($check == 0) header ("Location: ../activation_mail.php?a=8i2");
		if($status == 1) header ("Location: ../index.php?a=8i3");
		else
		{
			$run->code_mail($name,$mail,$status);
		    header ("Location: ../index.php?a=m8i");
		}
	}
?>