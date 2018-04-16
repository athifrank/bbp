<?php
	require_once('jcode.php');
	$run->db_open();
	$name=mysql_real_escape_string($_REQUEST['name']);
	$run->db_close();
	
	if( $name == null || $name == 'Add new Location') header ("Location: ../manage_location.php?a=kii");
	else
	{
		$run->db_open();
		$query1=mysql_query("SELECT id FROM location_list;");
		$no = mysql_num_rows($query1);
		$no1 = ceil($no /80);
		$query=mysql_query("INSERT INTO location_list(`name`)VALUES('$name');");
		$run->db_close();
		if($query)
		header ("Location: ../manage_location.php?a=ki9&page=$no1");
		else
		header ("Location: ../manage_location.php?a=qne");
	}
?>