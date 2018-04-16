<?php
	require_once('jcode.php');
	$run->db_open();	
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
	$bhk=mysql_real_escape_string($_REQUEST['bhk']);
	
	$room=mysql_real_escape_string($_REQUEST['room']);
	$broom=mysql_real_escape_string($_REQUEST['broom']);
	$hall=mysql_real_escape_string($_REQUEST['hall']);
	$troom=mysql_real_escape_string($_REQUEST['troom']);
	$park=mysql_real_escape_string($_REQUEST['park']);
	$floor=mysql_real_escape_string($_REQUEST['floor']);
	$amen=mysql_real_escape_string($run->re_char($_REQUEST['amen']));
	$rmark=mysql_real_escape_string($run->re_char($_REQUEST['rmark']));
	$face=mysql_real_escape_string($_REQUEST['face']);
	$l1=mysql_real_escape_string($_REQUEST['l1']);
	$l2=mysql_real_escape_string($_REQUEST['l2']);
	$run->db_close();
	session_start();
	$uid = $_SESSION['id'];

	if (empty($tit) || empty($loc) || empty($lmark) || empty($zone) || empty($area)|| empty($price) || empty($aa) || empty($ptype) || empty($pfrom) || empty($bank) || empty($nc) || empty($br))
	{
		$tit=base64_encode($tit);
		$loc=base64_encode($loc);
		$lmark=base64_encode($lmark);
		$zone=base64_encode($zone);
		$area=base64_encode($area);
		$price=base64_encode($price);
		$aa=base64_encode($aa);
		$ptype=base64_encode($ptype);
		$pfrom=base64_encode($pfrom);
		$bank=base64_encode($bank);
		$nc=base64_encode($nc);
		$br=base64_encode($br);
		$bhk=base64_encode($bhk);
		
		header ("Location: ../add_property.php?a=2i5&1=$tit&2=$loc&3=$lmark&4=$zone&5=$area&6=$price&7=$aa&8=$ptype&9=$pfrom&10=$bank&11=$nc&12=$br&13=$bhk
		");
	}
	else
	{
		if(empty($room))$room='0'; if(empty($broom))$broom='0'; if(empty($hall))$hall='0';if(empty($troom))$troom='0'; if(empty($floor))$floor='0';
		if(empty($park))$park='Not updated'; if(empty($amen))$amen='Not updated'; if(empty($rmark))$rmark='Not updated'; 
		if(empty($l1))$l1='Not updated'; if(empty($l2))$l2='Not updated'; if(empty($face))$face='Not updated';
		$run->db_open();
		$run->dates();
		
		#changing first character to upper case
		$tit=$run->uc_first($tit);
		$lmark=$run->uc_first($lmark);
		$nc=$run->uc_first($nc);
		$face=$run->uc_first($face);
		$amen=$run->uc_first($amen);
		$rmark=$run->uc_first($rmark);
		
		$query=mysql_query("INSERT INTO properties (`uid`,`date`,`tit`,`loc`,`lmark`,`zone`,`area`,`price`,`aa`,`ptype`,`pfrom`,`bank`,`nc`,`br`,`room`,`broom`,`hall`,`troom`,`park`,`floor`,`amen`,`rmark`,`l1`,`l2`,`bhk`,`face`)					 VALUES('$uid','$date','$tit','$loc','$lmark','$zone','$area','$price','$aa','$ptype','$pfrom','$bank','$nc','$br','$room','$broom','$hall','$troom','$park','$floor','$amen','$rmark','$l1','$l2','$bhk','$face');");
		
		if($query) header ("Location: ../add_image.php");
		else 
		{
			header ("Location: ../add_property.php?a=qne");
		}
		$run->db_close();
	}
?>

