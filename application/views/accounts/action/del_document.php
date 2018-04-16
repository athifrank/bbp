<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$query1=mysql_query("SELECT fname FROM documents where id=$id;");
	$row=mysql_fetch_array($query1);
	$fname=$row['fname'];
	unlink("../savefiles/$fname");
	$query2=mysql_query("DELETE FROM documents where id=$id;");
	$run->db_close();
	if($query2)
    header ("Location: ../property_documents.php?a=kie");
	else
	header ("Location: ../property_documents.php?a=qne");
?>