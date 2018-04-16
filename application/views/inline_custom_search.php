<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
?>

<?php include('pages/head.php')?>


      <div id="products">
	  	<?php //echo $showproperties; ?>
		<?php
		if(empty($showproperties))
		{
				echo '<br><br><div class="td">Properties not found for such criteria</div>';
		}
		else      
		{		
		foreach($showproperties as $row){
	
			    $fname=$row['fname'];	
				$ptype=$row['ptype'];
				$id=$row['pid'];
				$s=$row['pid'];
				$bhk=$row['bhk'];
				$tit=$row['tit'];
				$loc=$row['loc'];
				$area=$row['area'];
			    $price=$row['price'];
				
		    
				$tit=substr($tit, 0, 24-3)."...";
				$loc=substr($loc, 0, 24-3)."...";
				
				if($price == 0)$price = 'Contact for Price'; else $price =number_format("$price",2);
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
						  <div class="img">
						  <a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">
						  <img src="'.base_url().'/thumbs/'.$fname.'" /></a>
						  <div class="more"><a href="'.site_url().'slide_property/index/'.$id.'">More details</a></div>
						  </div>
						  <div class="list">Property Id : '.$id.'<br>Tittle : '.$tit.'<br />Type : '.$ptype;
						  if(!empty($bhk))echo'<span class="bhk">('.$bhk.' bhk)</span>';
						  echo'<br />Location : '.$loc.'<br />Area : '.$area.'<br />Price :Rs '.$price.'</div>
						  <div>
							<div class="addcom"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Add to compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#inline_content" class="inline" onclick="setin('.$id.')">I am Interested</a>
							</div>
						  </div>
						  </div>';
						  //$s++;
				}
		}
			
		}	
		
		 ?>
      </div>
   
   