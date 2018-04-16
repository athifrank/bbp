<?php
	require_once('jcode.php');
	$run->db_open();
	$mail=mysql_real_escape_string($_REQUEST['email']);
	$pass1=mysql_real_escape_string($_REQUEST['pass1']);
	$pass2=mysql_real_escape_string($_REQUEST['pass2']);
	$name=mysql_real_escape_string($_REQUEST['name']);
	$add=mysql_real_escape_string($_REQUEST['add']);
	$city=mysql_real_escape_string($_REQUEST['city']);
	$coun=mysql_real_escape_string($_REQUEST['coun']);
	$zip=mysql_real_escape_string($_REQUEST['zip']);
	$mobi=mysql_real_escape_string($_REQUEST['mobile']);
	$cname=mysql_real_escape_string($_REQUEST['cname']);
	$site=mysql_real_escape_string($_REQUEST['site']);
	$code=mysql_real_escape_string($_REQUEST['security_code']);
	$run->db_close();
	$run->dates();
	
	$pass=strrev(md5($pass1));
	#check -> empty fields 
	if (empty($mail) || empty($pass1) || empty($pass2) || empty($name) || empty($add) || empty($city) || empty($coun) || empty($zip) || empty($mobi) || empty($code) )
	{
		$mail=base64_encode($mail);
		$name=base64_encode($name);
		$add=base64_encode($add);
		$city=base64_encode($city);
		$coun=base64_encode($coun);
		$zip=base64_encode($zip);
		$mobi=base64_encode($mobi);
		$cname=base64_encode($cname);
		$site=base64_encode($site);
		header ("Location: ../../register.php?a=1i0&1=$mail&2=$name&3=$add&4=$city&5=$coun&6=$zip&7=$mobi&8=$cname&9=$site");
	}
	
	else
	{
		#check -> user already exits
		$run->db_open();
		$result = mysql_query("SELECT COUNT(eid)FROM users WHERE eid LIKE '$mail'");
		$run->db_close();
		$row = mysql_fetch_array($result);
		$check=$row['COUNT(eid)'];
		if($check > 0) header ("Location: ../../register.php?a=8i2");
		
		else
		{
			#check -> captcha
			session_start();
			if( $_SESSION['security_code'] == $code && !empty($_SESSION['security_code']))
			{
				unset($_SESSION['security_code']);
				#execute -> Insertion query
				$run->db_open();
				
				#changing first character to upper case
				$name=$run->uc_first($name);
				$add=$run->uc_first($add);
				$city=$run->uc_first($city);
				$coun=$run->uc_first($coun);
				$cname=$run->uc_first($cname);
				
				#changing all character to lower case
				$mail=$run->lc_all($mail);
				$site=$run->lc_all($site);
				
				$insert=mysql_query("INSERT INTO users(`eid`,`pass`,`name`,`add`,`city`,`coun`,`zip`,`mobi`,`cname`,`url`,`date`,`status`) VALUES ('$mail','$pass','$name','$add','$city','$coun','$zip','$mobi','$cname','$site','$date','$pass')");
				$run->db_close();
				if($insert)
				{
					$run->code_mail($name,$mail,$pass);
					header ("Location: ../index.php?a=m88"); 
				}
				else 
				{
					$mail=base64_encode($mail);
					$name=base64_encode($name);
					$add=base64_encode($add);
					$city=base64_encode($city);
					$coun=base64_encode($coun);
					$zip=base64_encode($zip);
					$mobi=base64_encode($mobi);
					$cname=base64_encode($cname);
					$site=base64_encode($site);
					header ("Location: ../../register.php?a=qne&1=$mail&2=$name&3=$add&4=$city&5=$coun&6=$zip&7=$mobi&8=$cname&9=$site");
				}
			}
			else 
			{
				  $mail=base64_encode($mail);
				  $name=base64_encode($name);
				  $add=base64_encode($add);
				  $city=base64_encode($city);
				  $coun=base64_encode($coun);
				  $zip=base64_encode($zip);
				  $mobi=base64_encode($mobi);
				  $cname=base64_encode($cname);
				  $site=base64_encode($site);
				  header ("Location: ../../register.php?a=8i8&1=$mail&2=$name&3=$add&4=$city&5=$coun&6=$zip&7=$mobi&8=$cname&9=$site");
			}
		}
	}
?>