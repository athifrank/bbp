<?php 

require_once('jcode.php');
$run->error();
$run->db_open();
$use1=mysql_real_escape_string($_REQUEST['user']);
$pas1=mysql_real_escape_string($_REQUEST['pass']);
$pas2=strrev(md5($pas1));
$run->db_close();

if(empty($use1) || empty($pas1))
{
	header("location:../index.php?a=23e");	
}
else
{
	$run->db_open();
	$query=mysql_query("SELECT * FROM users where eid like '$use1'");
	$run->db_close();
	$data=mysql_fetch_array($query);
	$use=$data['eid'];
	$pas=$data['pass'];
	$name=$data['name'];
	$id=$data['id'];
	$s=$data['status'];
	
	$use1=$run->lc_all($use1);
	
	if($s != 1) header("location:../index.php?a=i86");
	
	else
	{
		if($use==$use1 && $pas==$pas2)
		{
			session_start();
			$_SESSION['user'] = "1";
			$_SESSION['name'] = $name;
			$_SESSION['id'] = $id;
			$_SESSION['type'] = "user";
			header ("Location:../home.php");
		}
		else
		{
			header("location:../index.php?a=i85");
		}
	}
}
?>