<?php
	require_once('jcode.php');
	$run->db_open();
	$data=$_REQUEST['vel'];
	foreach($data as $id)
	{
	$query1=mysql_query("SELECT fname FROM image where pid=$id;");
	$row=mysql_fetch_array($query1);
	$fname=$row['fname'];
	if($fname == 'no.jpg'){echo '';}else{unlink("../savefiles/$fname"); unlink("../thumbs/$fname");}
	$query2=mysql_query("DELETE FROM properties where id=$id;");
	$query3=mysql_query("DELETE FROM image where pid=$id;");
	}
	$run->db_close();
	if($query2)
    header ("Location: ../users_properties.php?a=kii");
	else
	header ("Location: ../admin_properties.php?a=qne");
?>