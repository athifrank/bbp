<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	
	
	$query=mysql_query("DELETE FROM fp where pid=$id;");
	$run->db_close();
	if($query)
    header ("Location: ../manage_projects.php?a=kie");
	else
	header ("Location: ../manage_projects.php?a=qne");
?>