<?php
	require_once('jcode.php');
	$run->db_open();
	$pid=mysql_real_escape_string($_REQUEST['pid']);
	$pos=mysql_real_escape_string($_REQUEST['pos']);
	$run->db_close();
	
	if(empty($pid) || empty($pos)) header ("Location: ../featured_projects.php?a=kii");
	else
	{
		$run->db_open();
		
		$query=mysql_query("SELECT pos from fp where pid=$pid");
		$row = mysql_fetch_array($query);
		$pos1=$row['pos'];
		
		$query=mysql_query("SELECT pid from fp where pos=$pos");
		$row = mysql_fetch_array($query);
		$pid1=$row['pid'];
		
		$query=mysql_query("UPDATE fp SET pos='$pos' where pid=$pid;");
		$query=mysql_query("UPDATE fp SET pos='$pos1' where pid=$pid1");
		
		$run->db_close();
		if($query)
		header ("Location: ../featured_projects.php?a=ki9&b=$pos&c=$pos1");
		else
		header ("Location: ../featured_projects.php?a=qne");
	} 
?>