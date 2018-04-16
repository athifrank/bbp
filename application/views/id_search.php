<?php require_once('accounts/action/jcode.php'); 
	$run->db_open();
	$id = mysql_real_escape_string($_REQUEST['b']);
	if(empty($id) || $id=='Search by id') header ("Location:index.php?a=1i0");
	else
	{
		$query=mysql_query("SELECT * FROM properties where id =$id;");
		$run->db_close();
		if($query)
		{
			$check=mysql_num_rows($query);		
			if($check == 0)	
			{
				header ("Location:index.php?a=8i8");
			}
			else
			{
				$row=mysql_fetch_array($query);		
				$tit=$row['tit'];
				$loc=$row['loc'];
				$tit=$run->cut_string($tit, 24);
				$loc=$run->cut_string($loc, 24);
				$lc=$loc;
				$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
				header ("Location:property_details.php?i=$id&PropertyTitle=$tit&Location=$lc&TS=$TS");
			}
		}
		else header ("Location:index.php?a=8i8");
	}
?>
