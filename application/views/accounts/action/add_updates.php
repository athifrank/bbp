<?php
	require_once('jcode.php');
	$run->db_open();
	$type=mysql_real_escape_string($_REQUEST['type']);
	$msg=mysql_real_escape_string($_REQUEST['msg']);
	$url=mysql_real_escape_string($_REQUEST['url']);
	$run->db_close();
	
	$run->dates();
	
	if(empty($type)) header ("Location: ../manage_updates.php?a=kii");
	else
	{
		if($type == 1)
		{
			if(empty($msg) || $msg == 'Property Updates') header ("Location: ../manage_updates.php?a=kii");
			else
			{
				$run->db_open();
				$query=mysql_query("INSERT INTO updates(`msg`,`type`,`date`)VALUES('$msg','text','$date');");
				$run->db_close();
				if($query)
				header ("Location: ../manage_updates.php?a=ki9");
				else
				header ("Location: ../manage_updates.php?a=qne");
			}
		}
		
		else
		{
			if(empty($msg) || empty($url) || $msg == 'Property Updates' || $url == 'Url') header ("Location: ../manage_updates.php?a=kii");
			else
			{
				$run->db_open();
				$query=mysql_query("INSERT INTO updates(`msg`,`type`,`date`,`link`)VALUES('$msg','link','$date','$url');");
				$run->db_close();
				if($query)
				header ("Location: ../manage_updates.php?a=ki9");
				else
				header ("Location: ../manage_updates.php?a=qne");
			}
		}
			
	}
?>