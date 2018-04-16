<?php
	require_once('jcode.php');
	$run->db_open();
	$query=mysql_query("select * from admin;");
	$row=mysql_fetch_array($query);
	$chk=$row['pass'];
	
	$oldpassword=mysql_real_escape_string($_REQUEST['opword']);
	$newpassword=mysql_real_escape_string($_REQUEST['npword']);
	$cnewpassword=mysql_real_escape_string($_REQUEST['cnpword']);
	$run->db_close();
	$len=strlen($newpassword);
	
	if (empty($oldpassword) || empty($newpassword) || empty($cnewpassword))
	header ("Location: ../change_pass1.php?a=1i0");
	
	else if($chk != strrev(md5($oldpassword)))
	header ("Location: ../change_pass1.php?a=1mi");
	
	else if($newpassword != $cnewpassword )
	header ("Location: ../change_pass1.php?a=1ji");
	
	else if($len < 6)
	header ("Location: ../change_pass1.php?a=2ji");
	
	else
	{
		$run->db_open();
		$new=strrev(md5($newpassword));
		$query=mysql_query("UPDATE admin SET pass='$new';");
		$run->db_close();
		if($query)
		header ("Location: ../change_pass1.php?a=kii"); 
		else
		header ("Location: ../change_pass1.php?a=qne"); 
	}
?>