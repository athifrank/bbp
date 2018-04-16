<?php	
/*     require_once('accounts/action/jcode.php');
	$run = new jcode;
	$run->db_open(); */
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	$zone=$this->uri->segment(3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head_1.php')?>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8rc1.custom.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8rc1.custom.min.js"></script>
   <script>
	$(window).scroll(function(){
		
		var a =$(".refine_search").offset();
		
		if(a.top >136){
		$(".refine_search").css('top','0');
		}else{
		$(".refine_search").css('top','136px');
		}
	});
  </script>
  <script type="text/javascript">setTimeout(function() {$('#loc').fadeOut('slow');}, 2000);</script>

</head>
<body>
<?php include('pages/header.php')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <br />
  <div id="property_result" class="left">
    <div class="ptitle">
		<?php 
/* 		function quote($n){
			
			return '"'.$n.'"';
			
		}
		$top_val = $_POST['search_top'];if(isset($_POST["search_area"])){
		$tes_loc = implode(',',array_map("quote",$_POST["search_area"]));
		}else{
			$tes_loc='';
		}
		if($top_val ==''){
			$po_loc =$tes_loc;
		}else if(isset($_POST["search_area"])){
			
			$po_loc = '"'.$top_val.'",'.$tes_loc;

		}else{
			$po_loc = '"'.$top_val.'"';
		} */

		?>
		<a class="sort" href="<?=site_url();?>zonal_search/index/<?php echo $zone;?>">Sort by</a>
		<a class="sort" href="<?=site_url();?>zonal_price/index/<?php echo $zone;?>">price</a>
		<a class="sort" href="<?=site_url();?>zonal_new/index/<?php echo $zone;?>">New</a>
		<a class="sort">Relevant</a>
		<input type="button" onclick="location.href='index.php'"/>
	</div>

      <form action="compare_properties.php" method="post">
      <input type="hidden" name="i" value="<?php //echo $i;?>" />
      <input type="hidden" name="page" value="zonal_search.php" >
	  </form>
   <!--   <div class="display_msg" style="height:30px;">
		<table>
            <tr>
           		 <td>
            	<div id="jslider1">
                	<div id="range">Price <span id="amount1"></span></div>
                	<div id="slider1"></div>
            	</div>
            	</td>
                
                <td>
                	<div id="jslider2">
                    	<div id="range">Area <span id="amount2"></span></div>
                    	<div id="slider2"></div>
               		</div>
                </td>
            
            	<td>
            		<div id="jslider3">
                		<div id="range">Size <span id="amount3"></span></div>
                		<div id="slider3"></div>
            		</div>
            	</td>

            	
           </tr>
         </table>
      </div>
      <div class="display_msg" style="margin-top:10px; height:30px;">
            <div style="float:left; width:150px;">
            Price
            <select class="price">
            	<option value="1">Low to high</option>
                <option value="2">High to low</option>
            </select>
            </div>
            
            <div style="float:left; text-align:center; width:500px;">
            <?php
				  //  $run->error();
					$a=$_REQUEST['a'];
					if($a == '2i5')echo '<div class="red" id="h1">*Atleast two properties is needed to compare</div>';
					if($a == '2i8')echo '<div class="red" id="h1">*SMTP error try again later</div>';
					if($a == '2i9')echo '<div class="gre" id="h1">*We have communicated your message to the property owner</div>';
			?>
            </div>
            <div style="float:right; margin-right:10px; width: 90px;"><input type="submit" value="Compare"/></div>
      </div>-->
	  <div id="accordion" class="refine_search">
	   <span id="loc" style="color:red"><?php echo $this->session->flashdata('loc');?></span>
		<h3 class="refine_title">Locality</h3>
		
		<div class="ref_area">
			<form method="post" action="<?=site_url();?>location_search" name="myform">
				<input type="text" list="loc_list" name="search_top" />
					<datalist id="loc_list">
				<?php 
					
				foreach($location_search as $loc_list ){
						$loc_item = $loc_list['name']; 
				?>
					
						<option value="<?php echo $loc_item; ?>">
				<?php } ?>
					</datalist>
				<br />
					<?php 
					
					foreach($location_search as $loc_list ){
						$loc_item = $loc_list['name']; 
				?>
					
				<input type="checkbox" name="search_area[]" value="<?php echo $loc_item; ?>" /><?php echo $loc_item; ?><br />
				<?php } ?>
			
		</div>
				<input type="submit" value="submit" class="refine_box" />
			</form>
		<h3 class="refine_title">Price</h3>
		<div class="ref_area">
			<input type="checkbox" name="search_price[]" onclick="price_search(1);" />less 10lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(2);" />10 Lacs - 20 Lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(3);" />20 Lacs - 30 Lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(4);" />30 Lacs - 40 Lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(5);" />40 Lacs - 50 Lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(6);" />50 Lacs - 60 Lacs<br />
			<input type="checkbox" name="search_area[]" onclick="price_search(7);" />60 Lacs - 70 Lacs<br />
		</div>
		<h3 class="refine_title">BHK</h3>
		<div class="ref_bhk">
			<input type="checkbox" name="search_area[]" onclick="bhk(1);" />1Bhk<br />
			<input type="checkbox" name="search_area[]" onclick="bhk(2);" />2Bhk<br />
			<input type="checkbox" name="search_area[]" onclick="bhk(3);" />3Bhk<br />
			<input type="checkbox" name="search_area[]" onclick="bhk(4);" />4Bhk<br />
		</div>
	  </div>
      <div id="products">
	  	<?php 

		if(empty ($show_location))
		{
				echo '<br><br><div class="td">Properties not found for such criteria</div>';
		}
		else
		{						
			$s=1;
			foreach($show_location as $row)
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
						  
						  echo '</span><span class="tiit">'.$price.'</span>';
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
      </div>
        </form>
  	  
   </div>
   <div class="right"><?php include("pages/ads.php");?></div>
   <div class="clear"></div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("pages/footer.php");?>
</div> 
	<div style='display:none'>
		<div id='inline_content' style='padding:10px; background:#fff;'>
			<form action="interested.php" method="post" name="myform" id="myform">
        <div id="set"></div>
            <table>
				<tr><td height="20" class="red display_msg" colspan="3"><div id="myform_errorloc" class="error_strings"></div></td></tr>
				<tr><td height="40">Name</td><td></td><td><input type="text" name="name" class="tdbox" ></td></tr>
				<tr><td height="40">Mobile</td><td></td><td><input type="text" name="mobi" class="tdbox"></td></tr>
				<tr><td height="40">Email-id*</td><td></td><td><input type="text" name="eid" class="tdbox" ></td></tr>
				<tr><td></td><td></td><td height="40"><input type="hidden" name="page" value="zonal_search.php" >
				<input type="hidden" name="i" value="<?php echo $i ?>" >
				<input type="submit" value="Submit" ></td></tr>
            </table>
            </form>	
		</div>
	   </div>
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
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.addValidation("ptype","dontselect=0","Please select the property type");
  
//]]></script>
<script type="text/javascript" >
function price_search(data){
	//alert(123);
	$z1='<?php foreach($show_location as $row) $location=$row['loc']; echo $location;?>';
	//$z1='<?php echo $zone_id;?>';
	//alert($z1);
	$("#products").load('<?=site_url();?>lakhs_loc/index',{i:<?php foreach($showproperties as $row)  $i=$row['pid']; echo $i; ?>,am:data,zone:$z1});
	
}
function bhk(data){
	$z2='<?php foreach($show_location as $row) $location=$row['loc']; echo $location; ?>';
	//$z2='<?php echo $zone_id;?>';
	//alert($z2);
	$("#products").load('<?=site_url();?>bhk_loc/index',{i:<?php foreach($showproperties as $row)  $i=$row['pid']; echo $i; ?>,am:data,zone:$z2});
	
}
</script>
</body>
</html>
