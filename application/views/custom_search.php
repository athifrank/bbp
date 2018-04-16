<?php
/* 	include 'slider1.php';
	$price_min = price_min(); //Get minimum price of product for slider min value
	$price_max = price_max(); //Get maximum price of product for slide max value
	$area_min = area_min(); //Get minimum area of product for slider min value
	$area_max = area_max(); //Get maximum area of product for slide max value
	$bhk_min = bhk_min(); //Get maximum bhk of product for slide max value
	$bhk_max = bhk_max(); //Get maximum bhk of product for slide max value
	
	require_once('accounts/action/jcode.php');
	$run->error();
	$z1=$_REQUEST['ptype'];
	$z2=$_REQUEST['location'];
	$z3=$_REQUEST['type'];
	
	$back = $_SERVER['HTTP_REFERER'];
	if(empty($z1)) header ("Location:$back"); */
defined('BASEPATH') OR exit('No direct script access allowed');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php')?>
		 <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui-1.8rc1.custom.css"/>
        <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-ui-1.8rc1.custom.min.js"></script>
        <script type="text/javascript">
            $(function() 
			{
				$z1='<?=$z1;?>';
				$z2='<?=$z2;?>';
				$z3='<?=$z3;?>';
				$a1='<?=$price_min;?>';
			  	$a2='<?=$price_max;?>';
			  	$b1='<?=$area_min;?>';
			  	$b2='<?=$area_max;?>';
				$c1='<?=$bhk_min;?>';
			  	$c2='<?=$bhk_max;?>';
              	
			  	$products = $('#products');//Caching product object
			  	$ajaxMessage = $('#ajaxMessage');//Caching ajaxMessage object
			  			
			  	$slider1 = $("#slider1");//Caching slider object
              	$amount1 = $("#amount1");//Caching amount object
				
				$slider2 = $("#slider2");//Caching slider object
              	$amount2 = $("#amount2");//Caching amount object
				
				$slider3 = $("#slider3");//Caching slider object
              	$amount3 = $("#amount3");//Caching amount object

               	$slider1.slider
				({
                 	range: true, // necessary for creating a range slider
                  	min: $a1, // minimum range of slider
                  	max: $a2, //maximimum range of slider
                  	values: [$a1, $a2], //initial range of slider
                  	slide: function(event, ui) // This event is triggered on every mouse move during slide.
				  	{ 
				  		$a1=ui.values[0];
					  	$a2=ui.values[1];
                      	$amount1.html(' Rs ' + $a1 + ' - Rs ' + $a2);//set value of  amount span to current slider values
                  	},
                  	stop: function(event, ui) //This event is triggered when the user stops sliding.
					{
                      $ajaxMessage.css({display:'block'});
                      $products.find('ul').css({opacity:.2});
					  $products.load('<?=site_url();?>custom_search/show_pro',{price_min : $a1,price_max : $a2,area_min : $b1,area_max : $b2,bhk_min : $c1,bhk_max : $c2,z1 : $z1,z2 : $z2,z3 : $z3},
					  function(){$ajaxMessage.css({display:'none'});});
                  	}
              	});
				
				$amount1.html(' Rs ' + $slider1.slider("values", 0) + ' - Rs ' + $slider1.slider("values", 1));
			  
			  	$slider2.slider
				({
                 	range: true, // necessary for creating a range slider
                  	min: $b1, // minimum range of slider
                  	max: $b2, //maximimum range of slider
                  	values: [$b1, $b2], //initial range of slider
                  	slide: function(event, ui) // This event is triggered on every mouse move during slide.
				  	{ 
				  	  $b1=ui.values[0];
					  $b2=ui.values[1];
                      $amount2.html($b1+' sqft - '+$b2+'sqft');//set value of  amount span to current slider values
                  	},
                  	stop: function(event, ui) //This event is triggered when the user stops sliding.
					{
                      $ajaxMessage.css({display:'block'});
                      $products.find('ul').css({opacity:.2});
                      $products.load('<?=site_url();?>custom_search/show_pro',{price_min : $a1,price_max : $a2,area_min : $b1,area_max : $b2,bhk_min : $c1,bhk_max : $c2,z1 : $z1,z2 : $z2,z3 : $z3},
					  function(){$ajaxMessage.css({display:'none'}); });
                    }
              	});
				
				$amount2.html(" "+$slider2.slider("values", 0) + ' sqft  - ' + $slider2.slider("values", 1)+' sqft ');
			
				$slider3.slider
				({
                 	range: true, // necessary for creating a range slider
                  	min: $c1, // minimum range of slider
                  	max: $c2, //maximimum range of slider
                  	values: [$c1, $c2], //initial range of slider
                  	slide: function(event, ui) // This event is triggered on every mouse move during slide.
				  	{ 
				  	  $c1=ui.values[0];
					  $c2=ui.values[1];
                      $amount3.html(' bhk ' + $c1 + ' - bhk ' + $c2);//set value of  amount span to current slider values
                  	},
                  	stop: function(event, ui) //This event is triggered when the user stops sliding.
					{
                      $ajaxMessage.css({display:'block'});
                      $products.find('ul').css({opacity:.2});
                      $products.load('<?=site_url();?>custom_search/show_pro',{price_min : $a1,price_max : $a2,area_min : $b1,area_max : $b2,bhk_min : $c1,bhk_max : $c2,z1 : $z1,z2 : $z2,z3 : $z3},
					  function(){$ajaxMessage.css({display:'none'}); });
                    }
              	});
				
				$amount3.html(" "+$slider3.slider("values", 0) + ' bhk  - ' + $slider3.slider("values", 1)+' bhk ');
          });
	   </script>
		<link rel="stylesheet" href="<?=base_url();?>assets/css/colorbox.css" />
		<script src="<?=base_url();?>assets/js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				$(".inline").colorbox({inline:true, width:"26%", height:"45%"});
				$('.price').change(function() {	$s=$(this).val();
				  $ajaxMessage.css({display:'block'});
                  $products.find('ul').css({opacity:.2});
				  $products.load('<?=site_url();?>custom_search/show_pro',{price_min : $a1,price_max : $a2,area_min : $b1,area_max : $b2,bhk_min : $c1,bhk_max : $c2,z1 : $z1,z2 : $z2,z3 : $z3
				  ,s:$s},
				  function(){$ajaxMessage.css({display:'none'}); }); 
				});
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
  <div id="property_result" class="left">
      <div class="ptitle"><?php //echo "$zone Properties" ?><input type="button"  onclick="location.href='<?=site_url();?>index'"/></div>
      <form action="<?=site_url();?>compare_properties" method="post" name="myform">
      <input type="hidden" name="i" value="<?php  foreach($showproperties as $row){	$i=$row['pid']; echo $i;} ?>" />
      <input type="hidden" name="page" value="index.php" >
      <div class="display_msg" style="height:30px;">
		<table>
            <tr>
           		 <td>
            	<div id="jslider1" style="font-size:12px;">
                	<div id="range">Price<span id="amount1"></span></div>
                	<div id="slider1"></div>
            	</div>
            	</td>
                
                <td>
                	<div id="jslider2" style="font-size:12px;">
                    	<div id="range">Area <span id="amount2"></span></div>
                    	<div id="slider2"></div>
               		</div>
                </td>
            
            	<td>
            		<div id="jslider3" style="font-size:12px;">
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
			/* 
				    $run->error();
					$a=$_REQUEST['a'];
					if($a == '2i5')echo '<div class="red" id="h1">*Atleast two properties is needed to compare</div>';
					if($a == '2i8')echo '<div class="red" id="h1">*SMTP error try again later</div>';
					if($a == '2i9')echo '<div class="gre" id="h1">*We have communicated your message to the property owner</div>'; */
			?>
			
				<div class="gre" id="h1"><?php echo $this->session->flashdata('we');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
            </div>
            <div style="float:right; margin-right:10px; width: 90px;">
			<input type="submit" value="Compare" /></div>
      </div>
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
				$s=$row['pid'];
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
						  <div class="img">
						  <a href="'.site_url().'slide_property/index/'.$id.'">
						  <img src="'.base_url().'thumbs/'.$fname.'" /></a>
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
			<form action="<?=site_url();?>interested/custom" method="post" name="myform" id="myform">
            <div id="set"></div>
            <table>
            <tr><td height="20" class="red display_msg" colspan="3"><div id="myform_errorloc" class="error_strings"></div></td></tr>
            <tr><td height="40">Name</td><td></td><td><input type="text" name="name" class="tdbox" ></td></tr>
            <tr><td height="40">Mobile</td><td></td><td><input type="text" name="mobi" class="tdbox"></td></tr>
            <tr><td height="40">Email-id*</td><td></td><td><input type="text" name="eid" class="tdbox" ></td></tr>
            <tr><td></td><td></td><td height="40"><input type="hidden" name="page" value="custom_search.php" >
            <input type="hidden" name="i" value="<?php echo $i ?>" >
			<input type="hidden" name="ptype" value="<?php echo $z1; ?>" >
			<input type="hidden" name="location" value="<?php echo $z2; ?>" >
			<input type="hidden" name="type" value="<?php echo $z3; ?>" >
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
</body>
</html>
