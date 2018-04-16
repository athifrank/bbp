<?php
	require_once('accounts/action/jcode.php');
	$run->db_open();
	$name=mysql_real_escape_string($_REQUEST['name']);
	$mail=mysql_real_escape_string($_REQUEST['eid']);
	$mobi=mysql_real_escape_string($_REQUEST['mobile']);
	$feed=mysql_real_escape_string($_REQUEST['feed']);
	$code=mysql_real_escape_string($_REQUEST['security_code']);
	$run->db_close();
	
	if(empty($mobi)) $mobi='Not provided'; if(empty($name)) $name='Anonymous';
	
	#check -> captcha
	session_start();
	if( $_SESSION['security_code'] == $code && !empty($_SESSION['security_code']))
	{
		unset($_SESSION['security_code']);
		#execute -> Insertion query
		
		#mail 
		$from = "Customer@bangalorebestproperty.com";
		$to    = "contact@bangalorebestproperty.com";
		$subject  = 'Feedback';
		$headers = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $from . "\r\n";
		$headers .= "mailed-by: ". $from . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";			
		$message  = '<html>
					<head></head>
					
					<body>
					<div>
					<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
					<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
					<br />
					
					Dear admin,
					<p>Feedback from visitor.<br /><br />
					<span style="color:red">'.$feed.'</span>
					<br /><br />
					You can contact me with the information i have provided<br /><br />
					Name: '.$name.'<br />
					Mobile:'.$mobi.'<br />
					Email: '.$mail.'
					</p>
																									
					Regards ,<br />
					Bangalorebestproperty.</div>
					</body>
					</html>';
		
		if(mail($to, $subject, $message, $headers)) header ("Location: contactus.php?a=ki0"); 
		else header ("Location: contactus.php?a=qne");
	}
	else header ("Location: contactus.php?a=8i8");
?>