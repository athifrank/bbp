<?php
	require_once('jcode.php');
	$run->db_open();
	$type=mysql_real_escape_string($_REQUEST['type']);
	$msg=mysql_real_escape_string($_REQUEST['msg']);
	$url=mysql_real_escape_string($_REQUEST['url']);
	$run->db_close();
	
	$run->dates();
	
	if(empty($type)) header ("Location: ../manage_news.php?a=kii");
	else
	{
		if($type == 1)
		{
			if(empty($msg) || $msg == 'Property news') header ("Location: ../manage_news.php?a=kii");
			else
			{
				$run->db_open();
				$query=mysql_query("INSERT INTO news(`msg`,`type`,`date`)VALUES('$msg','text','$date');");
				$run->db_close();
				if($query)
				header ("Location: ../manage_news.php?a=ki9");
				else
				header ("Location: ../manage_news.php?a=qne");
			}
		}
		
		else
		{
			if(empty($msg) || empty($url) || $msg == 'Property news' || $url == 'Url') header ("Location: ../manage_news.php?a=kii");
			else
			{
				$run->db_open();
				$query=mysql_query("INSERT INTO news(`msg`,`type`,`date`,`link`)VALUES('$msg','link','$date','$url');");
				$run->db_close();
				if($query)
				header ("Location: ../manage_news.php?a=ki9");
				else
				header ("Location: ../manage_news.php?a=qne");
			}
		}
			
	}
?>