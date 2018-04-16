<?php 
    require_once('accounts/action/jcode.php');
	$page=$_REQUEST['page'];
	$i=$_REQUEST['i'];
	$id=$_REQUEST['id'];
	
	$name=$_REQUEST['name'];
	$mobi=$_REQUEST['mobi'];
	$mail=$_REQUEST['eid'];
		
	if(empty($mail)) $mail='Not provided';
	if(empty($mobi)) $mobi='Not provided';
	if(empty($name)) $name='Not provided';
	
	$run->db_open();
	$query=mysql_query("SELECT * from users u,properties p WHERE u.id= p.uid and p.id=$id");
	$run->db_close();
	$row = mysql_fetch_array($query);
	$tit=$row['tit'];
	$eid=$row['eid'];
	$ename=$row['name'];
	$pid=$row['id'];
	
	#mail 
	$from = $mail;
	$to    = $eid;

	$subject  = 'Bangalore Best Property';
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "mailed-by: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";			
	$message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>'.$name.' is interested to buy/rent your property - '.$tit.'.( Property Id : '.$pid.')<br /><br />
	You can contact him with the provided information below<br /><br />
	Name: '.$name.'<br />
	Mobile: '.$mobi.'<br />
	Email: '.$from.'
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';
		
	if(mail($to, $subject, $message, $headers)) header("Location: $page?i=$i&a=2i9");
	else header("Location: $page?i=$i&a=2i8");
?>