<?php
	require_once('jcode.php');
	$run->db_open();
	$type=mysql_real_escape_string($_REQUEST['type']);
	$id=mysql_real_escape_string($_REQUEST['id']);
	$msg=mysql_real_escape_string($_REQUEST['msg']);
	$url=mysql_real_escape_string($_REQUEST['url']);
	$run->db_close();
	
	if($type == 'text')
	{
		if(empty($msg)) header ("Location: ../edit_update.php?a=kii&b=$id");
		else
		{
			$run->db_open();
			$query=mysql_query("UPDATE updates SET msg='$msg' where id=$id");
			$run->db_close();
			if($query)
			header ("Location: ../edit_update.php?a=ki9&b=$id");
			else
			header ("Location: ../edit_update.php?a=qne&b=$id");
		}
	}
	
	else
	{
		if(empty($msg) || empty($url)) header ("Location: ../edit_update.php?a=kii&b=$id");
		else
		{
			$run->db_open();
			$query=mysql_query("UPDATE updates SET msg='$msg',link='$url' where id=$id");
			$run->db_close();
			if($query)
			header ("Location: ../edit_update.php?a=ki9&b=$id");
			else
			header ("Location: ../edit_update.php?a=qne&b=$id");
		}
	} 
?>