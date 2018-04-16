<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$query=mysql_query("UPDATE image SET thumbs='1' WHERE id=$id;");
	$run->db_close();
	if($query)
	header ("Location: ../manage_thumbnails.php?a=1ji");
	else
	header ("Location: ../manage_thumbnails.php?a=qne");
?>