<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$zone=$this->uri->segment(3);

?>

		<?php
		if(empty ($showproperties))
		{
				echo '<br><br><div class="td">Properties not found for such criteria</div>';
		}
		else
		{						
			$s=1;
			foreach($showproperties as $row)
			{
				$fname=$row['fname'];	
				$ptype=$row['ptype'];
				$id=$row['pid'];
				$bhk=$row['bhk'];
				$tit=$row['tit'];
				$loc=$row['loc'];
				$area=$row['area'];
				$price=$row['price'];
				
				$tit=substr($tit, 0, 24-3)."...";
				$loc=substr($loc, 0, 24-3)."...";
				
				if($price == 0)$price = 'Contact for Price'; else $price=number_format("$price",2);
				if(empty($fname))
				{
					echo '<div class="box">
						  <div><br>Invalid Property</div>
						  <div></div>
						  </div>';
				}
				else
				{
					$lc=$loc;
					$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
					echo '<div class="box1">
						  <div class="img">';
						  
						  echo '</span><span class="tiit">Rs &nbsp;'.$price.'</span>';
						  echo '</span><span class="loc">'.$loc.'</span>';
						  echo'<a href="'.site_url().'slide_property/index/'.$id.'">
						  <img src="'.base_url().'savefiles/'.$fname.'" width="330px" height="200px" />
						  </a></div>
						  <div class="more"><a href="'.site_url().'slide_property/index/'.$id.'">'.$tit.'</a></div>
						  <div class="list">Property Id : '.$id;
						  if(!empty($bhk))echo'<span class="bhk">'.$ptype;
						  echo'<br /></div>
						  <div>
						  <div class="addcom">
							<a class="wishli" title="Wishlist"><img src="'.base_url().'assets/images/wish1.png" width="40" height="30" /></a>
							<a class="wishi" title="Wishlist"><img src="'.base_url().'assets/images/wish.png" width="40" height="30" /></a>
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



