<?php
	require_once('jcode.php');
	$run->db_open();
	$pid=mysql_real_escape_string($_REQUEST['pid']);
	$run->db_close();
	
	if( $pid == null || $pid == 'Enter Property Id') header ("Location: ../manage_thumbnails.php?a=kii");
	else
	{
		$run->db_open();
		$query1=mysql_query("SELECT COUNT(pid),thumbs FROM image WHERE pid=$pid;");
		$row = mysql_fetch_array($query1);
		$run->db_close();
		$check=$row['COUNT(pid)'];
		$check1=$row['thumbs'];
		if($check == 0) header ("Location: ../manage_thumbnails.php?a=ki1");
		elseif($check1 == 2) header ("Location: ../manage_thumbnails.php?a=ki2");
		else
		{
			$run->db_open();
			$query=mysql_query("UPDATE image SET thumbs='2' WHERE pid=$pid;");
			$run->db_close();
			if($query)
			header ("Location: ../manage_thumbnails.php?a=ki9");
			else
			header ("Location: ../manage_thumbnails.php?a=qne");
		}
	}
?>