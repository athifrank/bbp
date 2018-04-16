<?php
	require_once('jcode.php');
	$run->db_open();
	$tit=mysql_real_escape_string($_REQUEST['tit']);
	$id=mysql_real_escape_string($_REQUEST['id']);
	$run->db_close();
	
	if(empty($tit)) header ("Location: ../edit_document.php?a=kii&b=$id");
	else
	{
		$run->db_open();
		$query=mysql_query("UPDATE documents SET tit='$tit' where id=$id");
		$run->db_close();
		if($query)
		header ("Location: ../edit_document.php?a=ki9&b=$id");
		else
		header ("Location: ../edit_document.php?a=qne&b=$id");
	}
?>