<?php
	require_once('jcode.php');
	$run->db_open();
	$pid=mysql_real_escape_string($_REQUEST['id']);
	$query=mysql_query("INSERT INTO image(`pid`,`fname`)VALUES('$pid','no.jpg')");
	$run->db_close();
	header ("Location: ../admin_properties.php?a=kie");

?>