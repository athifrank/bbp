<?php
 	require_once('jcode.php');
	$run->db_open();
	$mail=mysql_real_escape_string($_REQUEST['mail']);
	$run->db_close();
	if(empty($mail))
	{
		header ("Location: ../fpass.php?a=8i5");
	}
	else
	{
				$run->db_open();
				$query=mysql_query("SELECT COUNT(eid),id,eid,name FROM users WHERE eid LIKE '$mail'");
				$run->db_close();
				$row=mysql_fetch_array($query);
				$check=$row['COUNT(eid)'];
				$id=$row['id'];
				$name=$row['name'];
				$eid=$row['eid'];
				if($check == 0) {header ("Location: ../fpass.php?a=8i2");}				
				else
				{
						$key=$run->random_key();
						$key1=strrev(md5($key));
						$email ='noreply@bangalorebestproperty.com';
						$to    = $mail;
						$subject  = 'Password request';
						$message  = '
<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
<p><br />Dear '.$name.', </p>
<p>You have requested for a new password </p>
<p> Your login details are as follows:</p>
<p>Username: <span style="text-decoration:underline; color:#0033CC;">'.$eid.'</span><br />
password: '.$key.'</p>
<p>Please change your password when you login into your account</p>
<p style="margin-top:30px;">Regards ,<br />Bangalorebestproperty.<br /><a href="http://www.bangalorebestproperty.com/">www.bangalorebestproperty.com</a>
</p>';
						$headers = "From: " . $email . "\r\n";
						$headers .= "Reply-To: ". $email . "\r\n";
						$headers .= "mailed-by: ". $email . "\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
						$sent=mail($to, $subject, $message, $headers);
							
							if($sent)
							{
									$run->db_open();
									$query=mysql_query("UPDATE users SET pass='$key1' where id=$id");
									$run->db_close();
									header ("Location: ../index.php?a=i87");
							}
							else
							{
									header ("Location: ../fpass.php?a=i86");
							}
				}
	}
?>