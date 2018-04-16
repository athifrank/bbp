<?php 
//require_once('action/jcode.php'); 
//$run->user_login_check();
	  defined('BASEPATH') OR exit('No direct script access allowed');

	  	if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) 
		{
			$this->load->view('accounts/page_expired');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
<script type="text/javascript" src="action/gen_validatorv4.js"></script>
<!-- Google Maps-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
  function initialize() {
				var v1 = document.getElementById('v1').value;
				var v2 = document.getElementById('v2').value;
    var latlng = new google.maps.LatLng(v1, v2);
    var myOptions = {zoom: 14,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
  }
</script>

  <style>.bhk{display:none;}</style>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view("accounts/pages/user_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper" style="height:1500px;">
  <div id="parea">
    	<div class="ptitle">Add Property</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				/* 
					if($a == '2k9')echo '<div class="gre" id="h1">*New property added sucessfully</div>';
					if($a == '2i5')echo '<div class="red" id="h1">*Please fill all the required fields</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';  */
					
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('field');?></div>
				<div class="red" id="h1"><?php echo $this->session->flashdata('server');?></div>
                </div>
                <?php
		/* 		if(!empty($_REQUEST['1'])) $tit=base64_decode($_REQUEST['1']);
				if(!empty($_REQUEST['2'])) $loc=base64_decode($_REQUEST['2']);
				if(!empty($_REQUEST['3'])) $lmark=base64_decode($_REQUEST['3']);
				if(!empty($_REQUEST['4'])) $zone=base64_decode($_REQUEST['4']);
				if(!empty($_REQUEST['5'])) $area=base64_decode($_REQUEST['5']);
				if(!empty($_REQUEST['6'])) $price=base64_decode($_REQUEST['6']);
				if(!empty($_REQUEST['7'])) $aa=base64_decode($_REQUEST['7']);
				if(!empty($_REQUEST['8'])) $ptype=base64_decode($_REQUEST['8']);
				if(!empty($_REQUEST['9'])) $pfrom=base64_decode($_REQUEST['9']);
				if(!empty($_REQUEST['10'])) $bank=base64_decode($_REQUEST['10']);
				if(!empty($_REQUEST['11'])) $nc=base64_decode($_REQUEST['11']);
				if(!empty($_REQUEST['12'])) $br=base64_decode($_REQUEST['12']);
				if(!empty($_REQUEST['13'])) $bhk=base64_decode($_REQUEST['13']); */
				//if(!empty($_REQUEST['4'])) $zone=base64_decode($_REQUEST['4']);
               //if(!empty($_REQUEST['1'])) $tit=base64_decode($_REQUEST['1']);
				?>
                <form action="<?=site_url();?>add_property/insert_data" method="post" name="myform" id="myform">
			    <div style="margin:0 auto; width:450px;">
                <table width="470">
                <tr>
                  <td class="tdname"><span <?php //if(empty($br)) echo'class="red"';?>>Property*</span></td><td width="10"></td>
                  <td >
            	  <input type="radio" name="br" value="buy" <?php if($br == 'buy') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Sell</span> 
                  <input type="radio" name="br" value="rent" <?php if($br == 'rent') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">Rent</span>
                  </td>
       	  	  </tr>
              
        		<tr>
                  <td width="200" class="tdname"><span <?php //if(empty($tit)) echo'class="red"';?>>Property Title*</span></td>
              	  <td width="10"></td>
                  <td width="260" ><input name="tit" type="text" class="tdbox" value="<?php //echo $tit; ?>" required></td>
       	  	  	</tr>
                
              <tr>
                  <td class="tdname"><span <?php //if(empty($loc)) echo'class="red"';?>>Location*</span></td><td width="10"></td>
                  <td ><select name="loc" class="tdbox">
                  	<?php
						if($loc == '') echo '<option value="0" selected="selected"> -- Select --</option>';
						$se='';
/* 						$run->db_open();
						$query = mysql_query("SELECT * FROM location_list order by name");
						$run->db_close();  */
						foreach($get_loc as $row)
                        {
                                $name=$row['name'];
								if($name == $loc) $se='selected="selected"';
								echo '<option value="'.$name.'">'.$name.'</option>';
								$se='';
						}
						
					?>
                 	</select>
                  </td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname"><span <?php //if(empty($lmark)) echo'class="red"';?>>Landmark*</span></td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="lmark" value="<?php //echo $lmark; ?>" required></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname"><span <?php //if(empty($zone)) echo'class="red"';?>>Zones*</span></td><td width="10"></td>
                  <td >
                  <select name="zone" class="tdbox">
                  <?php if($zone == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                    <option value="North Bangalore" <?php if($zone == 'North Bangalore') echo 'selected="selected"'; ?>>North Bangalore</option>
                    <option value="South Bangalore" <?php if($zone == 'South Bangalore') echo 'selected="selected"'; ?>>South Bangalore</option>
                    <option value="East Bangalore" <?php if($zone == 'East Bangalore') echo 'selected="selected"'; ?>>East Bangalore</option>
                    <option value="West Bangalore" <?php if($zone == 'West Bangalore') echo 'selected="selected"'; ?>>West Bangalore</option>
                    <option value="Central Bangalore" <?php if($zone == 'Central Bangalore') echo 'selected="selected"'; ?>>Central Bangalore</option>
                 </select>
                  </td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname"><span <?php //if(empty($area)) echo'class="red"';?>>Area*</span></td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="area" value="<?php //echo $area; ?>" ><span class="hint">Sq.ft.</span></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname" ><span <?php //if(empty($price)) echo'class="red"';?>>Price*</span></td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="price" value="<?php //echo $price; ?>" title="If you don't wish to display the Price, Enter '00'" required>
                   <span class="hint">Rs.<img src="<?=base_url();?>assets/images/preview.png" title="If you don't wish to display the Price, Enter '00'" /></span>
                   </td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname" ><span <?php //if(empty($aa)) echo'class="red"';?>>Authority Approval*</span></td><td width="10"></td>
                  <td >
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
                   </td>
       	  	  </tr>
              
		<tr>
            <td class="tdname" ><span <?php //if(empty($ptype) ) echo'class="red"';?>>Property Type*</span></td><td width="10"></td>
            <td >
              	<select name="ptype" class="tdbox" id="item_select" style="width:164px;">
				  <?php if($ptype == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                  <option value="Land" <?php if($ptype == 'Land') echo 'selected="selected"'; ?>>Land</option>
                  <option value="Apartment" <?php if($ptype == 'Apartment') echo 'selected="selected"'; ?>>Apartment</option>
                  <option value="Residential House" <?php if($ptype == 'Residential House') echo 'selected="selected"'; ?>>Residential House</option>
                  <option value="Commercial Property" <?php if($ptype == 'Commercial Property') echo 'selected="selected"'; ?>>Commercial Property</option>              	  
				  <option value="Villappartment" <?php if($ptype == 'Villappartment') echo 'selected="selected"'; ?>>Villappartment</option>
                  <option value="Villas" <?php if($ptype == 'Villas') echo 'selected="selected"'; ?>>Villas</option>
                  <option value="Row House" <?php if($ptype == 'Row House') echo 'selected="selected"'; ?>>Row House</option>
             	</select>
             </td>
        </tr> 
            
       	<tr class="bhk">  	  
        	<td class="tdname" ><span <?php //if(empty($bhk)) echo'class="red"';?>>BHK*</span></td><td width="10"></td>
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

        <tr>
            <td class="tdname"><span <?php //if(empty($pfrom)) echo'class="red"';?>>Property From*</span></td><td width="10"></td>
            <td >                
              <select name="pfrom" class="tdbox">
                    <?php if($pfrom == '') echo '<option value="0" selected="selected"> -- Select --</option>'; ?>
                    <option value="Owner" <?php if($pfrom == 'Owner') echo 'selected="selected"'; ?>>Owner</option>
                    <option value="Broker" <?php if($pfrom == 'Broker') echo 'selected="selected"'; ?>>Broker</option>
              </select>
            </td>
        </tr>
              
        <tr>
            <td class="tdname"><span <?php //if(empty($bank)) echo'class="red"';?>>Bank approval*</span></td><td width="10"></td>
            <td >
              <input type="radio" name="bank" value="Yes" <?php if($bank == 'Yes') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Yes</span> 
              <input type="radio" name="bank" value="No" <?php if($bank == 'No') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">No</span>
            </td>
        </tr>
              
              <tr>
                  <td class="tdname"><span <?php //if(empty($nc)) echo'class="red"';?>>Name & Contact details*</span></td><td width="10"></td>
                  <td ><textarea name="nc" class="tdbox" style="height:50px;" required><?php //echo $nc; ?></textarea></td>
       	  	  </tr>
              <tr><td></td><td></td><td class="hint">Use Comma to seperate it</td></tr>
                                   
             </table>
             <br />
             Additional Information (optional)
             <hr />
             <br />
             <table width="470">
        		<tr>
                  <td width="200" class="tdname">Total no. of Rooms</td>
              	  <td width="10"></td>
                  <td width="260" ><input type="text" class="tdbox" name="room" value="<?php //echo $room; ?>"/></td>
       	  	  	</tr>
                
                  <tr>
                      <td class="tdname">No. of Bedrooms</td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="broom" value="<?php //echo $broom; ?>"/></td>
                  </tr>
                  
                  <tr>
                      <td class="tdname">No. of Living rooms</td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="hall" value="<?php //echo $hall; ?>"/></td>
                  </tr>
                  
                  <tr>
                      <td class="tdname">No. of Bathrooms</td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="troom" value="<?php //echo $troom; ?>"/></td>
                  </tr>
                  
                  <tr>
                      <td class="tdname">Floor number</td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="floor" value="<?php //echo $floor; ?>"/></td>
                  </tr>
                  
            <tr>
               <td class="tdname">Car Parking</td><td width="10"></td>
               <td >
               <input type="radio" name="park" value="Yes" <?php //if($park == 'Yes') echo 'checked="checked"'; ?>/><span style="margin:0 5px 0 5px;">Yes</span> 
               <input type="radio" name="park" value="No" <?php //if($park == 'No') echo 'checked="checked"'; ?>/><span style="margin-left:5px;">No</span>
               </td>
            </tr>
                  
                  <tr>
                  <td class="tdname">Facing</td><td width="10"></td>
                  <td >
                  	  <input type="text" class="tdbox" name="face" value="<?php //echo $face; ?>"/></td>
       	  	  	 </tr>
              
                  <tr>
                  <td class="tdname">Amenities</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="amen" value="<?php //echo $amen; ?>"/></td>
       	  	  </tr>
              
               <tr>
                      <td class="tdname">Remarks</td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="rmark" value="<?php //echo $rmark; ?>"/></td>
                  </tr>
              
              <tr>
                  <td class="tdname" colspan="3">Google map - Latitude and Longitude</td>
       	  	  </tr>
              	
                <tr>
                      <td class="tdname"><input type="text" class="tdbox" name="leven" id="v1" value="<?php //echo $l1; ?>"/></td><td width="10"></td>
                      <td ><input type="text" class="tdbox" name="twel"  id="v2" value="<?php //echo $l2; ?>" onBlur="initialize()"/><img src="<?=base_url();?>assets/images/preview.png" title="click outside the textbox to see the preview"/></td>
                  </tr>
                  <tr>
                      <td class="hint" style="text-align:right;">(eg 12.8383988</td><td width="10">,</td>
                      <td class="hint">77.6586514)</td>
                  </tr>
               <tr>
                  <td class="tdname" style="text-align:right;"><input type="submit"  value="Next" /></td>
                  <td width="10"></td>
                  <td> <input type="reset"  value="Reset" /></td>
              </tr>
             </table>Map Preview
             <div id="map_canvas" style="width:350px; height:300px; margin-top:10px;"></div>
             
             </div>
             </form>		
   	  </div>
      <div class="clear"></div>
   </div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 
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
  
  //frmvalidator.addValidation("broom","ltelmnt=room","No. of Bedrooms should be lesser than the total no. of rooms");
  //frmvalidator.addValidation("hall","leelmnt=broom","No. of Living rooms should be lesser than the no. of Bedrooms");
  
  frmvalidator.addValidation("troom","numeric","Bathrooms should be in numbers");
  frmvalidator.addValidation("floor","numeric","Floor no. should be in numbers");
  

//]]>
</script>
</body>
</html>
