<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$query=mysql_query("DELETE FROM users where id=$id");
	$run->db_close();
	if($query)
    header ("Location: ../manage_users.php?a=kii");
	else
	header ("Location: ../manage_users.php?a=qne");
?>