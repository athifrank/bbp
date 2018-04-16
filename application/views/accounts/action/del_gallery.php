<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$i=mysql_real_escape_string($_REQUEST['i']);
	$query1=mysql_query("SELECT fname FROM gallery where gid=$id;");
	$row=mysql_fetch_array($query1);
	$fname=$row['fname'];
	unlink("../savefiles/$fname");
	unlink("../thumbs/$fname");
	$query2=mysql_query("DELETE FROM gallery where gid=$id;");
	$run->db_close();
	if($query2)
    header ("Location: ../add_gallery.php?a=kie&i=$i");
	else
	header ("Location: ../add_gallery.php?a=qne&i=$i");
?>