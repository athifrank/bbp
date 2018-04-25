<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$zone=$this->uri->segment(3);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head_1.php')?>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
	    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui-1.8rc1.custom.css"/>
        <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-ui-1.8rc1.custom.min.js"></script>
		
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
			console.log(obj);
        pid = obj;
        document.getElementById("set").innerHTML = '<input type="hidden" name="id" value="'+pid+'" />';
        }
        //-->
        </script>
		
</head>
<body>
<?php include('pages/header_1.php')?>

<!----- Banner begins -----> 
<div id="content" class="wrapper">
 <br />
  <div id="property_result" class="left">
    <div class="ptitle">
		<a class="sort" style="margin-left: 560px;" href="<?=site_url();?>zonal_wishlist/index">wishList(<font color="orange"><?=count($wishlist)?></font>)</a>
		<input type="button"  onclick="javascript:history.back()"/>
	</div>
	<br/>
	
		<div style="float:right; text-align:center; width:1200px;font-size:17px;">
	  	       <div class="gre" id="h1"><?php echo $this->session->flashdata('we');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
	 </div> 
	  		
	    <form action="<?=site_url();?>compare_properties" method="post">
      <input type="hidden" name="i" value="<?php if($wishlist){foreach($wishlist as $row){	echo $row['pid'];}}else{ echo '';}?>" />
      <input type="hidden" name="page" value="zonal_search.php" >
      <div class="display_msg" style="margin-top:10px; height:30px;">
            <div style="float:right; margin-right:10px; width: 90px;"><input type="submit" value="Compare"/></div>
      </div>
	
      <div id="products1">
	  	<?php //showproperties('', $zone); ?>
		<?php
		if(empty ($wishlist))
		{
				echo '<br><br><div class="td">Wish List is empty...</div>';
		}
		else
		{						
			$s=1;
			foreach($wishlist as $row)
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
						  <div class="addcom" style="margin: 14px;"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#ex1" rel="modal:open" onclick="setin('.$id.')">Contact</a>
							</div>
							<ul id="navlist">
								<li id="home"><a href="default.asp"></a></li>
								<li id="prev"><a href="css_intro.asp"></a></li>
								<li id="next"><a href="css_syntax.asp"></a></li>
							</ul>
							
							<div class="" style="float:right; margin-right:20px;    margin-right: 84px;margin-top: -44px;">
							<div class="dropup">
							  <button class="dropbtn">share</button>
							  <div class="dropup-content">
							<a  target="__blank" 
							href="https://www.facebook.com/sharer/sharer.php?u='.site_url().'slide_property/index/'.$id.'"
							class="fb-xfbml-parse-ignore">
							<img style="width: 58%;height: 28px;" src="https://use.fontawesome.com/releases/v5.0.10/svgs/brands/facebook-square.svg">
                            </a>
						   <a href="https://plus.google.com/share?url='.site_url().'slide_property/index/'.$id.'" onclick="javascript:window.open(this.href,,menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600);return false;">							
							  <img style="width: 58%;height: 28px;" src="https://use.fontawesome.com/releases/v5.0.10/svgs/brands/google-plus-square.svg">
							</a>
							  </div>
							</div>
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
			<div id='ex1' class="modal" style='padding:10px; background:#fff;'>
			<form action="<?=site_url();?>interested/zonal_contact_wish" method="post" name="myform" id="myform">
            <table>
            <tr><td height="20" class="red display_msg" colspan="3"><div id="myform_errorloc" class="error_strings"></div></td></tr>
            <tr><td height="40">Name</td><td></td><td><input type="text" name="name" class="tdbox" ></td></tr>
            <tr><td height="40">Mobile</td><td></td><td><input type="text" name="mobi" class="tdbox"></td></tr>
            <tr><td height="40">Email-id*</td><td></td><td><input type="text" name="eid" class="tdbox" ></td></tr>
            <tr><td></td><td><div id="set"></div></td><td height="40"><input type="hidden" name="page" value="custom_search.php" >
			<input type="hidden" name="zone" value="<?php echo $this->uri->segment(3);?>" >
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
