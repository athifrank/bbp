<?php
	require_once('jcode.php');
	$run->db_open();
	$crop=mysql_real_escape_string($_REQUEST['crop']);
	$pid=mysql_real_escape_string($_REQUEST['id']);
	$run->db_close();
	
	if( empty($crop))
	{
		header ("Location: ../add_gallery.php?a=dm3&i=$pid");
	}
	else
	{
		$run->db_open();
		$query=mysql_query("UPDATE fp SET thumbs='$crop' where pid=$pid;");
		$run->db_close();
		header ("Location: ../add_gallery.php?a=ki7&i=$pid");
	}
?>