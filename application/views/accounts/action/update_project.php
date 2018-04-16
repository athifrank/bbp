<?php
	require_once('jcode.php');
	$run->db_open();
	$tit=mysql_real_escape_string($_REQUEST['tit']);
	$loc=mysql_real_escape_string($_REQUEST['loc']);
	$ptype=mysql_real_escape_string($_REQUEST['ptype']);
	$text=mysql_real_escape_string($_REQUEST['text']);
	$pid=mysql_real_escape_string($_REQUEST['pid']);
	$run->db_close();
	
	if( !empty($tit) || !empty($loc) || !empty($ptype) || !empty($text))
	{
		$tit = ucwords(strtolower($tit));
		$run->db_open();
		$query=mysql_query("UPDATE fp SET tit='$tit',loc='$loc',ptype='$ptype',text='$text' where pid=$pid;");
		$run->db_close();
		header ("Location: ../edit_project.php?a=kie&b=$pid");
	}
	else header ("Location: ../edit_project.php?a=qne&b=$pid");
?>