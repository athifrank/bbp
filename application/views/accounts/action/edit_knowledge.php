<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$content=mysql_real_escape_string($_REQUEST['content']);
	$title=mysql_real_escape_string($_REQUEST['title']);
	$update_date=mysql_real_escape_string($_REQUEST['update_date']);
	$discription=mysql_real_escape_string($_REQUEST['discription']);
	$run->db_close();
	
	if(empty($id) || empty($content) || empty($title) || empty($update_date) || empty($discription))
	{
		header ("Location: ../edit_knowledge.php?a=1i0&b=$id");
	}
	else
	{	
		$run->db_open();
		$query=mysql_query("UPDATE knowledge_house SET `content`='$content',`title`='$title',`update_date`='$update_date',`discription`='$discription' where id=$id");
		$run->db_close();
	
		if($query)
		header ("Location: ../edit_knowledge.php?a=kii&b=$id");
		else
		header ("Location: ../edit_knowledge.php?a=qne&b=$id");
	}
?>