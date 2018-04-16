<?php
	require_once('accounts/action/jcode.php');
	$run->db_open();
	$run->error();
	
		$i= mysql_real_escape_string($_REQUEST['i']);
		$am= mysql_real_escape_string($_REQUEST['am']);
	/* 	if($i==1)$zone='North Bangalore';
		if($i==2)$zone='East Bangalore';
		if($i==3)$zone='South Bangalore';
		if($i==4)$zone='West Bangalore';
		if($i==5)$zone='Central Bangalore'; */
		
		if($am ==1){
			
			$am = 'AND p.price <= 1000000';
			
		}else if($am ==2){
			
			$am = 'AND p.price >= 1000000 AND p.price <= 2000000';
			
		}else if($am ==3){
			
			$am = 'AND p.price >= 2000000 AND p.price <= 3000000';
			
		}else if($am ==4){
			
			$am = 'AND p.price >= 3000000 AND p.price <= 4000000';
		}else if($am ==5){
			
			$am = 'AND p.price >= 4000000 AND p.price <= 5000000';
		}else if($am ==6){
			
			$am = 'AND p.price >= 6000000 AND p.price <= 7000000';
		}else if($am ==7){
			
			$am = 'AND p.price >= 7000000 AND p.price <= 8000000';
		}

		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.zone like '$zone'";
		session_start();
		
		$order = " group by i.pid ORDER BY p.price DESC";
		
		$run = new jcode;
		
		if($where != '') $query1 = $query . mysql_escape_string($where).$order;
		else $query2 =$query.$am.$order;
		
		//echo $query1;
		
		$query = mysql_query($query2);
		$no = mysql_num_rows($query);
		if(empty ($no))
		{
				echo '<br><br><div class="td" style="width:1000px">Properties not found for such criteria</div>';
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
				
				if($price == 0)$price = 'Contact for Price';// else $price = $run->money($price);
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
						  <div class="img">';
						  
						  echo '</span><span class="tiit">'.$price.'</span>';
						  echo '</span><span class="loc">'.$loc.'</span>';
						  echo'<a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">
						  <img src="accounts/savefiles/'.$fname.'" width="330px" height="200px" />
						  </a></div>
						  <div class="more"><a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">'.$tit.'</a></div>
						  <div class="list">Property Id : '.$id;
						  if(!empty($bhk))echo'<span class="bhk">'.$ptype;
						  echo'<br /></div>
						  <div>
						  <div class="addcom">
							<a class="wishli" title="Wishlist"><img src="images/wish1.png" width="40" height="30" /></a>
							<a class="wishi" title="Wishlist"><img src="images/wish.png" width="40" height="30" /></a>
						  </div>
						  <div class="addcom"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#inline_content" class="inline" onclick="setin('.$id.')">Contact</a>
							</div>
							<ul id="navlist">
								<li id="home"><a href="default.asp"></a></li>
								<li id="prev"><a href="css_intro.asp"></a></li>
								<li id="next"><a href="css_syntax.asp"></a></li>
							</ul>
							<div class="addcom" style="float:right; margin-right:20px;"><button class="share">share</button>
							</div>
						  </div>
						  </div>';
						  $s++;
				}
			}
		}
?>