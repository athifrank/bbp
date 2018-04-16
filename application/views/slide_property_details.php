<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('accounts/action/jcode.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php')?>
<!-- Google Maps-->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>

<!-- Image view-->
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');</script>
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		});
	</script>
    
       <link rel="stylesheet" href="<?=base_url();?>assets/css/colorbox.css" />
		<script src="<?=base_url();?>assets/js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				$(".inline").colorbox({inline:true, width:"26%", height:"45%"});
			});
		</script>
        
		<script type="text/javascript">
        <!--
        //initial checkCount of zero
        var checkCount=0
        
        //maximum number of allowed checked boxes
        var maxChecks=3
        
        function setChecks(obj){3
        //increment/decrement checkCount
        if(obj.checked){
        checkCount=checkCount+1
        }else{
        checkCount=checkCount-1
        }
        //if they checked a 4th box, uncheck the box, then decrement checkcount and pop alert
        if (checkCount>maxChecks){
        obj.checked=false
        checkCount=checkCount-1
        alert('You can Compare only '+maxChecks+' Properties at a time')
        }
        }
        function setin(obj) {
        pid = obj;
        document.getElementById("set").innerHTML = '<input type="hidden" name="id" value="'+pid+'" />';
        }
        //-->
        </script>
</head>
<body>
<?php include('pages/header.php')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <br />
  <div id="parea">
        	<div class="ptitle">Property Details <input type="button"  onclick="history.back();"/></div>
            <div class="pcontent">
            	<div class="display_msg">
                 <?php
				/* 	$run->error();
					$id=$_REQUEST['i'];
					$run->db_open();
					$query1 = mysql_query("SELECT count(id) as c FROM properties WHERE id=$id");
					$run->db_close();
					$row = mysql_fetch_array($query1);
					$c=$row['c'];
					if(empty($id) || $c == 0)
					{
						echo '<div class="red">*Invaid Input Error #203</div>';
						exit;
					} */
			    ?>
				
				<div class="gre" id="h1"><?php echo $this->session->flashdata('we');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
                </div>
              <?php 
			    $count=count($result);
				foreach($result as $row){
				//$id=$row['id'];	
				$br=$row['br'];
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
				$uid=$row['uid'];
				
		?>
        <div style="margin:0 auto; width:800px; text-transform:capitalize;">
        		<div class="gre" style="margin-left:5px; font-size:16px; height:25px; border-bottom:#060 1px dotted;">
				<div style="float:left;"><?php echo $tit.'('.$loc.')';?></div>
                </div><br />
            	<table width="400">
                	<tr>
                    	<td>
                        	<table width="400" height="350">
                          	<tr><td height="260">
                            <a rel="example_group" href="<?=base_url();?>savefiles/<?php echo $fname; ?>">
                            <img src="<?=base_url();?>savefiles/<?php echo $fname;?>" height="260" width="380" title="Click to zoom" /></a></td></tr>
                    		<tr><td height="25">Name & Contact Details</td></tr>
                            <tr><td><?php echo $nc;?></td></tr>
                            </table>
                        </td>
                        <td>
                        	<table width="400" height="350">
                                <tr><td width="180">Property</td><td width="10">:</td><td class="tdbox"><?php echo $br;?></td></tr>
                                <tr><td>Property Id</td><td>:</td><td><?php echo $id;?></td></tr>
                                <tr><td>Project Title</td><td>:</td><td class="tdbox"><?php echo $tit;?></td></tr>
                                <tr><td>Created on</td><td>:</td><td><?php echo $date;?></td></tr>
                                <tr><td>Location</td><td>:</td><td><?php echo $loc;?></td></tr>
                                <tr><td>Landmark</td><td>:</td><td><?php echo $lmark;?></td></tr>
                                <tr><td>Zone</td><td>:</td><td><?php echo $zone;?></td></tr>
                                <tr><td>Property type</td><td>:</td><td><?php echo $ptype; if(!empty($bhk))echo" ($bhk BHK)";?></td></tr>
                                <tr><td>Property from</td><td>:</td><td><?php echo $pfrom;?></td></tr>
                                <tr><td>Area</td><td>:</td><td><?php echo "$area Sq.ft." ;?></td></tr>
                                <tr><td>Price</td><td>:</td><td><?php if($price == 00)
								echo "Contact for price"; else echo 'Rs &nbsp;'.$money;?></td></tr>
                                <tr><td>Authority approval</td><td>:</td><td><?php echo $aa;?></td></tr>
                                <tr><td>Bank approval</td><td>:</td><td><?php echo $bank;?></td></tr>
                                
                            </table>
                        </td>
          		</table>
				<div class="ints" style="float:right; margin:0px;">
							<a href="#inline_content" class="inline" onclick="setin('.$id.')">I am Interested</a>
					</div>
                <br />Addional Information 
                
                <hr /><br />
				  <table width="400">
                	<tr>
                        <td>
                        	<table width="400" height="320">
                                <tr><td width="180">Total no. of Rooms</td><td width="10">:</td><td width="210"><?php echo $room;?></td></tr>
                                <tr><td>No. of Bedroom</td><td>:</td><td class="tdbox"><?php echo $broom;?></td></tr>
                                <tr><td>No. of Hall</td><td>:</td><td><?php echo $hall;?></td></tr>
                                <tr><td>No. of Bathrooms</td><td>:</td><td><?php echo $troom;?></td></tr>
                                <tr><td>Floor number</td><td>:</td><td><?php echo $floor;?></td></tr>
                                <tr><td>Car Parking</td><td>:</td><td><?php echo $park;?></td></tr>
                                <tr><td>Facing</td><td>:</td><td><?php echo $face;?></td></tr>
                                <tr><td>Remarks</td><td>:</td><td><?php echo $rmark;?></td></tr>
                            </table>
                        </td>
                        <td>
                        	<table width="400" height="300">
                            <tr><td height="20">Google map - Latitude:<?php echo $l1;?>  /  Longitude:<?php echo $l2;?></td></tr>
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
					</tr>
					<table style="padding-top:20px;">
						<tr><td width="180">Amenities</td><td width="10">:</td><td><?php echo $amen;?></td></tr>
					</table>
          		</table>
               
               
        </div>	
		
				<?php } ?>
   	  </div>
      <div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("pages/footer.php");?>
	
	  <div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<form action="<?=site_url();?>interested" method="post" name="myform" id="myform">
            <div id="set"></div>
            <table>
            <tr><td height="20" class="red display_msg" colspan="3"><div id="myform_errorloc" class="error_strings"></div></td></tr>
            <tr><td height="40">Name</td><td></td><td><input type="text" name="name" class="tdbox" ></td></tr>
            <tr><td height="40">Mobile</td><td></td><td><input type="text" name="mobi" class="tdbox"></td></tr>
            <tr><td height="40">Email-id*</td><td></td><td><input type="text" name="eid" class="tdbox" ></td></tr>
            <tr><td></td><td></td><td height="40">
			<input type="hidden" name="page" value="property_details.php" >
            <input type="hidden" name="id" value="<?php echo $id ?>" >
			<input type="hidden" name="i" value="<?php echo $id ?>" >
            <input type="submit" value="Submit" ></td></tr>
            </table>
            </form>	
		  </div>
	   </div>
          
    <script type="text/javascript">
	window.onload = function() {
    var latlng = new google.maps.LatLng(<?php echo $l1.','.$l2; ?>);
    var myOptions = {zoom: 14,center: latlng,mapTypeId: google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	}
</script>
       <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("eid","maxlen=50","Email-id should be within 50 characters");
  frmvalidator.addValidation("eid","req","Email-id is required");
  frmvalidator.addValidation("eid","email","Enter a valid email-id");
  
  </script>

</div> 

</body>
</html>
