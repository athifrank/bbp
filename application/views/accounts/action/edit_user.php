<?php
	require_once('jcode.php');
	$run->db_open();
	$name=mysql_real_escape_string($_REQUEST['name']);
	$eid=mysql_real_escape_string($_REQUEST['eid']);
	$add=mysql_real_escape_string($_REQUEST['add']);
	$city=mysql_real_escape_string($_REQUEST['city']);
	$coun=mysql_real_escape_string($_REQUEST['coun']);
	$zip=mysql_real_escape_string($_REQUEST['zip']);
	$mobi=mysql_real_escape_string($_REQUEST['mobi']);
	$cname=mysql_real_escape_string($_REQUEST['cname']);
	$website=mysql_real_escape_string($_REQUEST['url']);
	$id=mysql_real_escape_string($_REQUEST['id']);
	$run->db_close();
	
	if(empty($name) || empty($eid) || empty($add) || empty($city) ||  empty($coun) || empty($zip) || empty($mobi))
	{
		header ("Location: ../edit_user.php?a=1i0&b=$id");
	}
	else
	{	
		$run->db_open();
		$query=mysql_query("UPDATE users SET `name`='$name',`eid`='$eid',`add`='$add',`city`='$city',`coun`='$coun',`zip`='$zip',`mobi`='$mobi',
	`cname`='$cname',`url`='$website' where id=$id");
		$run->db_close();
	
		if($query)
		header ("Location: ../edit_user.php?a=kii&b=$id");
		else
		header ("Location: ../edit_user.php?a=qne&b=$id");
	}
?>