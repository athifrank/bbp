<?php
	require_once('jcode.php');
	$run->db_open();
	$run->dates();
	$tit=mysql_real_escape_string($_REQUEST['tit']);
	$loc=mysql_real_escape_string($_REQUEST['loc']);
	$ptype=mysql_real_escape_string($_REQUEST['ptype']);
	$text=mysql_real_escape_string($_REQUEST['text']);
	$run->db_close();
	
	if( !empty($tit) || !empty($loc) || !empty($ptype) || !empty($text))
	{
		$tit = ucwords(strtolower($tit));
		$run->db_open();
		$query=mysql_query("SELECT max(pos)+1 p FROM fp;");
		$row=mysql_fetch_array($query);
		$pos=$row['p'];
	$query=mysql_query("INSERT INTO fp(`pos`,`tit`,`loc`,`ptype`,`banner`,`thumbs`,`text`,`date`)VALUES('$pos','$tit','$loc','$ptype','no.jpg','no.jpg','$text','$date');");
		$run->db_close();
		header ("Location: ../manage_projects.php?a=ki9");
	}
	else header ("Location: ../add_projects.php?a=qne");
?>