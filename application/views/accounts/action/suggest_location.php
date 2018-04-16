<?php
	require_once('jcode.php');
	$run->db_open();
	$val=mysql_real_escape_string($_REQUEST['term']);
	$run->db_close();
	if ( !isset($val) )
    exit;
	
	$run->db_open();
	$rs = mysql_query("select name from location_list where name like '$val%' order by name asc limit 0,10");
	$data = array();
	while( $row = mysql_fetch_array($rs) )
	{
		$data[] = array('label' => $row['name']);
	}
	$run->db_close();

echo json_encode($data);
flush();

