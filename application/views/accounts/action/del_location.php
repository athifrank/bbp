<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$s = ceil($id /80);
	$query=mysql_query("DELETE FROM location_list where id=$id;");
	$run->db_close();
	if($query)
    header ("Location: ../manage_location.php?a=1ji&page=$s");
	else
	header ("Location: ../manage_location.php?a=qne$page=$s");
?>