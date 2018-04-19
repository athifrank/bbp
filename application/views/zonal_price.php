<?php
/* 	include 'slider.php';
	$price_min = price_min(); //Get minimum price of product for slider min value
	$price_max = price_max(); //Get maximum price of product for slide max value
	$area_min = area_min(); //Get minimum area of product for slider min value
	$area_max = area_max(); //Get maximum area of product for slide max value
	$bhk_min = bhk_min(); //Get maximum bhk of product for slide max value
	$bhk_max = bhk_max(); //Get maximum bhk of product for slide max value
	
    require_once('accounts/action/jcode.php'); 
	$i=$_REQUEST['i'];
	if($i==1)$zone='North Bangalore';
	if($i==2)$zone='East Bangalore';
	if($i==3)$zone='South Bangalore';
	if($i==4)$zone='West Bangalore';
	if($i==5)$zone='Central Bangalore'; */
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
			$(document).ready(function(){

				$a1='<?=$price_min;?>';
			  	$a2='<?=$price_max;?>';
			  	$b1='<?=$area_min;?>';
			  	$b2='<?=$area_max;?>';
				$c1='<?=$bhk_min;?>';
			  	$c2='<?=$bhk_max;?>';
				$products = $('#products1');
					$ajaxMessage = $('#ajaxMessage');
				$('.price').change(function() {	$s=$(this).val();
				  $ajaxMessage.css({display:'block'});
                  $products.find('ul').css({opacity:.2});
				  $products.load('<?=site_url();?>zonal_price/show_pro',{price_min : $a1,price_max : $a2,area_min : $b1,area_max : $b2,bhk_min : $c1,bhk_max : $c2,s:$s},
				  function(){$ajaxMessage.css({display:'none'}); }); 
				});
			});
		</script>
        
</head>
<body>
<?php include('pages/header_1.php')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <br />
  <div id="property_result" class="left">
    <div class="ptitle">
		<?php //echo "$zone Properties" ?>
		<a class="sort" href="<?=site_url();?>zonal_search/index/<?php echo $zone;?>">Sort by</a>
		<a class="sort" href="<?=site_url();?>zonal_price/index/<?php echo $zone;?>">price</a>
		<a class="sort" href="<?=site_url();?>zonal_new/index/<?php echo $zone;?>">New</a>
		<a class="sort">Relevant</a>
		<a class="sort" href="<?=site_url();?>zonal_wishlist/index">wishList(<font color="orange"><?=count($wishlist)?></font>)</a>
		<input type="button"  onclick="location.href='<?=site_url();?>index'"/>
	</div>
	<br>
	 <div >
            Sort by Price:
            <select class="price">
            	<option value="1">Low to high</option>
                <option value="2">High to low</option>
            </select>
            </div>
            

      <div id="products1">
	  	<?php //showproperties('', $zone); ?>
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
						  <a  title="add to Wishlist" class="circle_wish" id="wish1'.$id.'" onclick="wish1('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
							<i class="fa fa-heart" style="font-size:24px;color:gray;margin-top: 3px;"></i></a>
							
							<a  title="added in Wishlist" class="circle_wish" id="wish'.$id.'" onclick="wish('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
							<i class="fa fa-heart" style="font-size:24px;color:green;margin-top: 3px;"></i></a>
						  
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
      </div>
      <nav id="page-nav">
			<a href="#"></a>
	  </nav>
  	  
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

<script type="text/javascript" >
$('a[id^="wish"]').hide();
$('a[id^="wish1"]').show();

function _getWishList(){
	var data='<?php if(isset($wishlist)){foreach($wishlist as $row ){echo $val=$row['p_id'];}}else{echo 'null';}?>';
	var split_val=data.split("");
	var len=split_val.length;
	for(var i=0;i<len;i++){
		$("#wish1"+split_val[i]).hide();
		$("#wish"+split_val[i]).show();
	}
}

_getWishList();

function wish1(id,user){
	if(user==null){
		alert('please login first');
	}else{
	var col='g';
	   $.ajax({
                method: 'POST',
				data:{id:id,col:col,user:user},
                url: '<?=site_url();?>zonal_wishlist/add',
				success:function(){
					alert('Property number '+id+' added to wish list');
					location.reload();
				}
            });
	}
}

function wish(id,user){
	console.log(id);
		if(user==null){
				alert('please login first');
			}else{
			   $.ajax({
						method: 'POST',
						data:{id:id,user:user},
						url: '<?=site_url();?>zonal_wishlist/del',
						success:function(){
							alert('Property number '+id+' deleted from wish list');
							location.reload();
						}
					});
			}

}
</script>
</body>
</html>
