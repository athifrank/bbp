<?php 

require_once('jcode.php');
$run->db_open();
$use1=mysql_real_escape_string($_REQUEST['user']);
$pas1=mysql_real_escape_string($_REQUEST['pass']);
$pas2=strrev(md5($pas1));
$run->db_close();

if(empty($use1) || empty($pas1))
{
	header("location:../index1.php?a=23e");	
}
else
{
	$run->db_open();
	$query=mysql_query("SELECT * FROM admin");
	$run->db_close();
	$data=mysql_fetch_array($query);
	$use=$data['use'];
	$pas=$data['pass'];
	$name=$data['name'];
	
	if($use==$use1 && $pas==$pas2)
	{
		session_start();
		$_SESSION['admin'] = "1";
		$_SESSION['name'] = $name;
		header ("Location: ../home1.php");
	}
	else
	{
		header('location: ../index1.php?a=i85');
	}
}
?>