<?php
	require_once('accounts/action/jcode.php');
	$run->db_open();
	$run->error();
	
	$s= mysql_real_escape_string($_REQUEST['s']);
	$z1= mysql_real_escape_string($_REQUEST['z1']);
	$z2= mysql_real_escape_string($_REQUEST['z2']);
	$z3= mysql_real_escape_string($_REQUEST['z3']);
	$price_min = mysql_real_escape_string($_REQUEST['price_min']);
	$price_max = mysql_real_escape_string($_REQUEST['price_max']);
	$area_min = mysql_real_escape_string($_REQUEST['area_min']);
	$area_max = mysql_real_escape_string($_REQUEST['area_max']);
	$bhk_min = mysql_real_escape_string($_REQUEST['bhk_min']);
	$bhk_max = mysql_real_escape_string($_REQUEST['bhk_max']);
    
    if($s ==1) $s="asc"; else $s="desc";

	//Where condition
	if(($price_min!=''&&$price_max!='') || ($area_max!=''&&$area_max!='') || ($bhk_max!=''&&$bhk_max!='')) 
	{
    	$where = "and price >= $price_min and price <= $price_max and area >= $area_min and area <= $area_max and bhk >= $bhk_min and bhk <= $bhk_max";
    	showproperties($where, $z1,$z2,$z3,$s);
	}

	//get the minimum price of properties 
	function price_min() 
	{
		$query = "SELECT min(price) min from properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) 
		{
			$row = mysql_fetch_array($result);
			return $row['min'];
		}
		else return 0;
	}
	
	//get the maximum price of properties
	function price_max() 
	{
		$query = "SELECT max(price) max from properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			return $row['max'];
		}
		else return 0;
	}
	
	//get the minimum Area of properties
	function area_min() 
	{
		$query = "SELECT min(area) min from properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) 
		{
			$row = mysql_fetch_array($result);
			return $row['min'];
		}
		else return 0;
	}
	
	//get the maximum Area of properties
	function area_max() 
	{
		$query = "SELECT max(area) max from properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			return $row['max'];
		}
		else return 0;
	}
	
	//get the minimum bhk of properties
	function bhk_min() 
	{
		$query = "SELECT min(bhk) min FROM properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) 
		{
			$row = mysql_fetch_array($result);
			return $row['min'];
		}
		else return 0;
	}
	
	//get the maximum bhk of properties
	function bhk_max() 
	{
		$query = "SELECT max(bhk) max from properties";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			return $row['max'];
		}
		else return 0;
	}
	//Dispaly properties
	function showproperties($where='' ,$z1,$z2,$z3,$s) {
		if(empty($z2) && empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' ";
		if(!empty($z2) && empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.loc = '$z2' ";
		if(empty($z2) && !empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.br = '$z3' ";
		if(!empty($z1) && !empty($z2) && !empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.loc = '$z2' and p.br= '$z3' ";
		
		$order = " group by i.pid ORDER BY p.price $s";
		
		$run = new jcode;
		
		if($where != '') $query1 = $query . mysql_escape_string($where).$order;
		else $query1 =$query.$order;
		
		//echo $query1;
		
		$query = mysql_query($query1);
		$no = mysql_num_rows($query);
		
		if(empty ($no))
		{
				echo '<br><br><div class="td">Properties not found for such criteria</div>';
		}
		else
		{						
			$s=1;
			while($row = mysql_fetch_array($query))
			{
				$fname=$row['fname'];	
				$ptype=$row['ptype'];
				$id=$row['pid'];
				$bhk=$row['bhk'];
				$tit=$row['tit'];
				$loc=$row['loc'];
				$area=$row['area'];
				$price=$row['price'];
				
				$tit=$run->cut_string($tit, 24);
				$loc=$run->cut_string($loc, 24);
				
				if($price == 0)$price = 'Contact for Price'; else $price = $run->money($price);
				if(empty($fname))
				{
					echo '<div class="box">
						  <div><br>Invalid Property</div>
						  <div></div>
						  </div>';
				}
				else
				{
					$lc=mysql_real_escape_string($loc);
					$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
					echo '<div class="box1">
						  <div class="img">
						  <a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">
						  <img src="accounts/thumbs/'.$fname.'" /></a>
						  <div class="more"><a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">More details</a></div>
						  </div>
						  <div class="list">Property Id : '.$id.'<br>Tittle : '.$tit.'<br />Type : '.$ptype;
						  if(!empty($bhk))echo'<span class="bhk">('.$bhk.' bhk)</span>';
						  echo'<br />Location : '.$loc.'<br />Area : '.$area.'<br />Price : '.$price.'</div>
						  <div>
							<div class="addcom"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Add to compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#inline_content" class="inline" onclick="setin('.$id.')">I am Interested</a>
							</div>
						  </div>
						  </div>';
						  $s++;
				}
			}
		}

	}
?>