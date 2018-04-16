<?php 
/*      include('action/jcode.php'); 
	  $run->admin_login_check(); */
	  	   defined('BASEPATH') OR exit('No direct script access allowed');
	  	if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
		{
			$this->load->view('accounts/page_expired1');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
<script type="text/javascript" src="<?=base_url();?>assets/js/gen_validatorv4.js"></script>
<!-- Google Maps-->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>

<style>.bhk{display:none;}</style>

</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view('accounts/pages/admin_menu'); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
        	<div class="ptitle">Property Details <input type="button"  onclick="window.location.href='<?=site_url();?>admin_properties'"/></div>
            <div class="pcontent">
            	<div class="display_msg">
				<?php
					/* $run->error();
					$id=$_REQUEST['b'];
					$run->db_open();
					$query1 = mysql_query("SELECT count(id) as c FROM properties WHERE id=$id");
					$run->db_close();
					$row = mysql_fetch_array($query1);
					$c=$row['c'];
					if(empty($id) || $c == 0)
					{
						echo '<div class="red">*Invaid Input Error #203</div>';
						exit;
					}
					$a=$_REQUEST['a'];
					if($a == '2k9')echo '<div class="gre" id="h1">*Property Updated sucessfully</div>';
					if($a == '2i5')echo '<div class="red" id="h1">*Please fill all the required fields</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('field');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('success');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('try');?></div>
                </div>
              <?php 
	  		 $count=count($result);
				foreach($result as $row){
				$fname=$row['fname'];
				$tit=$row['tit'];
				$date=$row['date'];
				$loc=$row['loc'];
			    $zone=$row['zone'];
				$lmark=$row['lmark'];
				$area=$row['area'];
				$price=$row['price'];
				$aa=$row['aa'];
				$ptype=$row['ptype'];
				$pfrom=$row['pfrom'];
				$bank=$row['bank'];
				$br=$row['br'];
				$nc=$row['nc'];
				$room=$row['room'];
				$broom=$row['broom'];
				$hall=$row['hall'];
				$troom=$row['troom'];
				$park=$row['park'];
				$floor=$row['floor'];
				$amen=$row['amen'];
				$rmark=$row['rmark'];
				$l1=$row['l1'];
				$l2=$row['l2'];
				$bhk=$row['bhk'];
				$face=$row['face'];
		?>
      <form action="<?=site_url();?>edit_property/admin_edit_pro/<?php echo $id; ?>" method="post" name="myform" id="myform"/>
        <div style="margin:0 auto; width:800px; height:800px;">
        		<div class="gre" style="margin-left:5px; font-size:16px; height:25px; border-bottom:#060 1px dotted;">
					<?php echo $tit.'('.$loc.')';?>
                    <span style="float:right;"><input type="submit" value="Save" /></span>
                </div><br />
            	<table width="400">
                	<tr>
                    	<td>
                        	<table width="400" height="350">
                          	<tr><td height="260">
                            <a rel="example_group" href="<?=base_url();?>update_image1/index/<?php echo $id; ?>">
                            <img src="<?=base_url();?>savefiles/<?php echo $fname;?>" height="260" width="380" title="Click to Update the image" /></a></td></tr>
                    		<tr><td height="25">Name & Contact Details</td></tr>
                            <tr><td><textarea name="nc" class="tdbox" style="height:60px; width:380px" ><?php echo $nc; ?></textarea></td></tr>
                            <tr>
                              <td class="hint">Use Comma to seperate it</td></tr>
                            </table>
                        </td>
                        <td>
                        	<table width="400" height="350">
               <tr>
                  <td class="tdname"><span <?php if(empty($br) && $a == '2i5') echo'class="red"';?>>Property*</span></td><td width="10"></td>
                  <td >
                  <input type="radio" name="br" value="buy" <?php if($br == 'buy') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Sell</span> 
                  <input type="radio" name="br" value="rent" <?php if($br == 'rent') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">Rent</span>
                  </td>
       	  	  </tr>
                                
              <tr><td width="180">Property Id</td><td width="10">:</td><td width="210"><?php echo $id;?></td></tr>
              <tr><td>Project Title</td><td>:</td><td class="tdbox">
              <input name="tit" type="text" class="tdbox" value="<?php echo $tit;?>"/></td></tr>
              <tr><td>Created on</td><td>:</td><td><?php echo $date;?></td></tr>
              
              <tr>
                  <td class="tdname"><span <?php if(empty($loc) && $a == '2i5') echo'class="red"';?>>Location*</span></td><td width="10"></td>
                  <td ><select name="loc" class="tdbox">
                  	<?php
						if($loc == '') echo '<option value="0" selected="selected"> -- Select --</option>';
						$se='';
                         foreach($loc_list as $row)
                        {
                                $name=$row['name'];
								if($name == $loc) $se='selected="selected"';
								echo '<option value="'.$name.'"'.$se.'>'.$name.'</option>';
								$se='';
						}
						
					?>
                 	</select>
                  </td>
       	  	  </tr>
              
              <tr><td>Landmark</td><td>:</td><td>
              <input type="text" class="tdbox" name="lmark" value="<?php echo $lmark;?>"></td></tr>
              <tr><td>Zone</td><td>:</td><td>
              <select name="zone" class="tdbox">
                  <?php if($zone == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                    <option value="North Bangalore" <?php if($zone == 'North Bangalore') echo 'selected="selected"'; ?>>North Bangalore</option>
                    <option value="South Bangalore" <?php if($zone == 'South Bangalore') echo 'selected="selected"'; ?>>South Bangalore</option>
                    <option value="East Bangalore" <?php if($zone == 'East Bangalore') echo 'selected="selected"'; ?>>East Bangalore</option>
                    <option value="West Bangalore" <?php if($zone == 'West Bangalore') echo 'selected="selected"'; ?>>West Bangalore</option>
                    <option value="Central Bangalore" <?php if($zone == 'Central Bangalore') echo 'selected="selected"'; ?>>Central Bangalore</option>
                 </select>
               </td></tr>
               
               <tr><td>Property type</td><td>:</td><td>
                <select name="ptype" class="tdbox" id="item_select" style="width:164px;">
				  <?php if($ptype == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                  <option value="Land" <?php if($ptype == 'Land') echo 'selected="selected"'; ?>>Land</option>
                  <option value="Apartment" <?php if($ptype == 'Apartment') echo 'selected="selected"'; ?>>Apartment</option>
                  <option value="Residential House" <?php if($ptype == 'Residential House') echo 'selected="selected"'; ?>>Residential House</option>
                  <option value="Commercial Property" <?php if($ptype == 'Commercial Property') echo 'selected="selected"'; ?>>Commercial Property</option>              	  <option value="Villappartment" <?php if($ptype == 'Villappartment') echo 'selected="selected"'; ?>>Villappartment</option>
                  <option value="Villas" <?php if($ptype == 'Villas') echo 'selected="selected"'; ?>>Villas</option>
                  <option value="Row House" <?php if($ptype == 'Row House') echo 'selected="selected"'; ?>>Row House</option>
             	</select>
                <?php if(!empty($bhk))echo'<span class="hint">'.$bhk.'bhk</span>';?>
                 </td></tr>
                <tr class="bhk">  	  
                <td class="tdname" >BHK*</td><td width="10"></td>
        		<td>
                    <select class="tdbox" name="bhk">
                      <?php if($bhk == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                      <option <?php if($bhk == 1) echo 'selected="selected"'; ?>>1</option>
                      <option <?php if($bhk == 2) echo 'selected="selected"'; ?>>2</option>
                      <option <?php if($bhk == 3) echo 'selected="selected"'; ?>>3</option>
                      <option <?php if($bhk == 4) echo 'selected="selected"'; ?>>4</option>
                      <option <?php if($bhk == 5) echo 'selected="selected"'; ?>>5</option>
                      <option <?php if($bhk == 6) echo 'selected="selected"'; ?>>6</option>
                      <option <?php if($bhk == 7) echo 'selected="selected"'; ?>>7</option>
                      <option <?php if($bhk == 8) echo 'selected="selected"'; ?>>8</option>
                      <option <?php if($bhk == 9) echo 'selected="selected"'; ?>>9</option>
                      <option <?php if($bhk == '9+') echo 'selected="selected"'; ?>>9+</option>
                     </select>
                 </td> 
      		</tr>
            
            <tr><td>Property from</td><td>:</td><td>
              <select name="pfrom" class="tdbox">
                    <?php if($pfrom == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                    <option value="Owner" <?php if($pfrom == 'Owner') echo 'selected="selected"'; ?>>Owner</option>
                    <option value="Broker" <?php if($pfrom == 'Broker') echo 'selected="selected"'; ?>>Broker</option>
              </select>
            </td></tr>
                                                    
            <tr><td>Area</td><td>:</td><td>
            <input type="text" class="tdbox" name="area" value="<?php echo $area;?>" style="width:164px;"/>
            <span class="hint">Sq.ft.</span></td></tr>
            <tr><td>Price</td><td>:</td><td>
            <input type="text" class="tdbox" name="price" value="<?php echo $price;?>" style="width:164px;"
            title="If you don't wish to display the Price, Enter '00'"/>
            <span class="hint">Rs.<img src="<?=base_url();?>assets/images/preview.png" title="If you don't wish to display the Price, Enter '00'" /></span>
            </td></tr>
            <tr><td>Authority approval</td><td>:</td><td>
            <select name="aa" class="tdbox">
				<?php if($aa == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                <option value="BDA" <?php if($aa == 'BDA') echo 'selected="selected"'; ?>>BDA</option>
                <option value="BMRDA" <?php if($aa == 'BMRDA') echo 'selected="selected"'; ?>>BMRDA</option>
                <option value="BIAPPA" <?php if($aa == 'BIAPPA') echo 'selected="selected"'; ?>>BIAPPA</option>
                <option value="CMC" <?php if($aa == 'CMC') echo 'selected="selected"'; ?>>CMC</option>
                <option value="BBMP" <?php if($aa == 'BBMP') echo 'selected="selected"'; ?>>BBMP</option>
                <option value="Revenue" <?php if($aa == 'Revenue') echo 'selected="selected"'; ?>>Revenue</option>
                <option value="Nelamangala DA" <?php if($aa == 'Nelamangala DA') echo 'selected="selected"'; ?>>Nelamangala DA</option>
                <option value="Others" <?php if($aa == 'Others') echo 'selected="selected"'; ?>>Others</option>
           </select>
								
        </td></tr>
        <tr><td>Bank approval</td><td>:</td><td>
              <input type="radio" name="bank" value="Yes" <?php if($bank == 'Yes') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Yes</span> 
              <input type="radio" name="bank" value="No" <?php if($bank == 'No') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">No</span> 
        </td></tr>

       </table>
      </td>
   </table>
                <br />Addional Information<hr /><br />
                <table width="400">
                	<tr>
                        <td>
                        	<table width="400" height="320">
                                <tr><td width="180">Total no. of Rooms</td><td width="10">:</td><td width="210">
								<input type="text" class="tdbox" name="room" value="<?php echo $room;?>"/></td></tr>
                                <tr><td>No. of Bedrooms</td><td>:</td><td class="tdbox">
								<input type="text" class="tdbox" name="broom" value="<?php echo $broom;?>"/></td></tr>
                                <tr><td>No. of Living rooms</td><td>:</td><td>
								<input type="text" class="tdbox" name="hall" value="<?php echo $hall;?>"/></td></tr>
                                <tr><td>No. of Bathrooms</td><td>:</td><td>
								<input type="text" class="tdbox" name="troom" value="<?php echo $troom;?>"/></td></tr>
                                <tr><td>Floor number</td><td>:</td><td>
								<input type="text" class="tdbox" name="floor" value="<?php echo $floor;?>"/></td></tr>
                                <tr><td>Car Parking</td><td>:</td><td>
               <input type="radio" name="park" value="Yes" <?php if($park == 'Yes') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Yes</span> 
               <input type="radio" name="park" value="No" <?php if($park == 'No') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">No</span> 
								</td></tr>
                                <tr><td>Facing</td><td>:</td><td>
								<input type="text" class="tdbox" name="face" value="<?php echo $face;?>"/></td></tr>
                                <tr><td>Amenities</td><td>:</td><td>
								<input type="text" class="tdbox" name="amen" value="<?php echo $amen;?>"/></td></tr>
                                <tr><td>Remarks</td><td>:</td><td>
								<input type="text" class="tdbox" name="rmark" value="<?php echo $rmark;?>"/></td></tr>
                            </table>
                        </td>
                        <td>
                        	<table width="400" height="300">
                            <tr><td height="20">
                             Latitude:<input type="text" name="leven" value="<?php echo $l1;?>" style="width:100px;"/> 
                              Longitude:<input type="text" name="twel" value="<?php echo $l2;?>" style="width:100px;"/></td></tr>
                          	<tr><td height="300">
                            	<?php
									if($l1=='Not updated' || $l2=='Not updated')
									echo'<div style="margin-top:10px; text-align:center; width:380px;">
									Preview not available Update Latitude &Latitude values</div>';
									else
									echo'<div id="map_canvas" style="width:350px; height:300px; margin-top:10px;"></div>';
								?>
                            	
                            </td></tr>
                            </table>
                        </td>
          		</table>
                </form>
				<?php } ?>
        </div>	
   	  </div>
      <div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
    <script language="JavaScript" type="text/javascript" xml:space="preserve">
//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 
  frmvalidator.addValidation("area","numeric","Area should be in numbers");
  frmvalidator.addValidation("area","minlen=3" ,"Area should be more than 3 digit");
  frmvalidator.addValidation("price","numeric","Price should be in numbers");
  
  frmvalidator.addValidation("room","numeric","Rooms should be in numbers");
  frmvalidator.addValidation("broom","numeric","Bedrooms should be in numbers");
  frmvalidator.addValidation("hall","numeric","Hall should be in numbers");
  
  //frmvalidator.addValidation("broom","leelmnt=room","No. of Bedrooms should be lesser than the total no. of rooms");
  //frmvalidator.addValidation("hall","leelmnt=broom","No. of Living rooms should be lesser than the no. of Bedrooms");
  
  frmvalidator.addValidation("troom","numeric","Bathrooms should be in numbers");
  frmvalidator.addValidation("floor","numeric","Floor no. should be in numbers");
  

//]]>
</script>
    
    
    <script type="text/javascript">
	window.onload = function() {
    var latlng = new google.maps.LatLng(<?php echo $l1.','.$l2; ?>);
    var myOptions = {zoom: 14,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	}
</script>
</div> 

</body>
</html>
