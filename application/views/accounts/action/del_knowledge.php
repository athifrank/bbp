<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	
	$result = mysql_query("SELECT * from knowledge_house where id=$id"); 
		  while($row = mysql_fetch_assoc($result))
		  {
		 $img=$row['img'];	
		  }
		  
	$query=mysql_query("DELETE FROM knowledge_house where id=$id");
	
	unlink('../'.$img);
	
	$run->db_close();
	if($query)
    header ("Location: ../manage_knowledge_house.php?a=kii");
	else
	header ("Location: ../manage_knowledge_house.php?a=qne");
?>