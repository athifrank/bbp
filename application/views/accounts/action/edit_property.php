<?php
	require_once('jcode.php');
	$run->db_open();
	$id=mysql_real_escape_string($_REQUEST['id']);
	$tit=mysql_real_escape_string($run->re_char($_REQUEST['tit']));
	$loc=mysql_real_escape_string($_REQUEST['loc']);
	$lmark=mysql_real_escape_string($run->re_char($_REQUEST['lmark']));
	$zone=mysql_real_escape_string($_REQUEST['zone']);
	$area=mysql_real_escape_string($_REQUEST['area']);
	$price=mysql_real_escape_string($_REQUEST['price']);
	$aa=mysql_real_escape_string($_REQUEST['aa']);
	$ptype=mysql_real_escape_string($_REQUEST['ptype']);
	$pfrom=mysql_real_escape_string($_REQUEST['pfrom']);
	$bank=mysql_real_escape_string($_REQUEST['bank']);
	$nc=mysql_real_escape_string($run->re_char($_REQUEST['nc']));
	$br=mysql_real_escape_string($_REQUEST['br']);
	
	$room=mysql_real_escape_string($_REQUEST['room']);
	$broom=mysql_real_escape_string($_REQUEST['broom']);
	$hall=mysql_real_escape_string($_REQUEST['hall']);
	$troom=mysql_real_escape_string($_REQUEST['troom']);
	$park=mysql_real_escape_string($_REQUEST['park']);
	$floor=mysql_real_escape_string($_REQUEST['floor']);
	$amen=mysql_real_escape_string($run->re_char($_REQUEST['amen']));
	$rmark=mysql_real_escape_string($run->re_char($_REQUEST['rmark']));
	$l1=mysql_real_escape_string($_REQUEST['l1']);
	$l2=mysql_real_escape_string($_REQUEST['l2']);
	$bhk=mysql_real_escape_string($_REQUEST['bhk']);
	$face=mysql_real_escape_string($_REQUEST['face']);
	$run->db_close();
	
	session_start();
	$uid = $_SESSION['id'];
	
	if(empty($room))$room='0'; if(empty($broom))$broom='0'; if(empty($hall))$hall='0';if(empty($troom))$troom='0'; if(empty($floor))$floor='0';
	if(empty($park))$park='Not updated'; if(empty($amen))$amen='Not updated'; if(empty($rmark))$rmark='Not updated'; 
	if(empty($l1))$l1='Not updated'; if(empty($l2))$l2='Not updated'; if(empty($face))$face='Not updated'; 
	if($ptype == 'Land' || $ptype == 'Commercial Property')$bhk=0;
	
	if (empty($tit) || empty($loc) || empty($lmark) || empty($zone) || empty($area)|| empty($price) || empty($aa) || empty($ptype) || empty($pfrom) || empty($bank) || empty($nc) || empty($br))
	{
		header ("Location: ../edit_property.php?a=2i5&b=$id");
	}
	else
	{
		$run->db_open();
		
		#changing first character to upper case
		$tit=$run->uc_first($tit);
		$lmark=$run->uc_first($lmark);
		$nc=$run->uc_first($nc);
		$face=$run->uc_first($face);
		$amen=$run->uc_first($amen);
		$rmark=$run->uc_first($rmark);
		
		$query=mysql_query("UPDATE properties SET tit='$tit',loc='$loc',lmark='$lmark',zone='$zone',area='$area',price='$price'
		,aa='$aa',ptype='$ptype',pfrom='$pfrom',bank='$bank',nc='$nc',br='$br',room='$room',broom='$broom'
		,hall='$hall',troom='$troom',park='$park',floor='$floor',amen='$amen',rmark='$rmark',l1='$l1',l2='$l2',bhk='$bhk',face='$face' WHERE id=$id");					
		header ("Location: ../edit_property.php?a=2k9&b=$id");
		$run->db_close();
	}
?>

