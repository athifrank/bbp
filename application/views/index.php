<?php 
//require_once APPATH.'accounts/action/jcode';
//$this->load->view('accounts/action/jcode.php');
//require_once('accounts/action/jcode.php');
defined('BASEPATH') OR exit('No direct script access allowed');

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('pages/head.php')?>
<script src="<?=base_url();?>assets/js/jcarousellite_1.0.1c4.js"></script>
<script src="<?=base_url();?>assets/js/jMyCarousel.js"></script>
<script src="<?=base_url();?>assets/js/mapper.js"></script>

<script type='text/javascript' src="<?=base_url();?>assets/js/gen_validatorv4.js"></script>

<script type='text/javascript' src="<?=base_url();?>assets/js/jquery.imageScroller.js"></script>
<script type='text/javascript' src="<?=base_url();?>assets/js/test.js"></script>
<script type="text/javascript">
$(function() {
	$(".updates").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:500,
		speed:3500
	});

});
</script>
<script type="text/javascript">
function mouseOver()
{
document.getElementById("mm").src ="map_c.png"
}
</script>

<!-- Ajax Autoload-->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui-1.8.2.custom.css" />
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-ui-1.8.2.custom.min.js"></script> 
  <script> 
  jQuery(document).ready(function(){	
			$('#location_list').autocomplete({source:'<?=site_url();?>suggest_location', minLength:1});
		});
  </script>
  <style type="text/css">
	*{margin:0; padding: 0;}
	#marqueeUl{list-style: none;}
	.nav{max-width: 800px; margin: 0 auto; padding:20px 0; display: flex; flex-flow:row wrap; justify-content:space-around; border-bottom: 1px solid #ddd;}
	.nav a{font-size: 14px; color: #333; text-decoration: none;}
	.nav a:hover, .nav .current{color: #f00; text-decoration: underline;}
		.a{height: 92px; overflow: hidden;}
		#marqueeLi{ width: 100px; border:1px solid #ddd; line-height: 2.4; font-size: 30px; text-align: center; float: left;}
	</style>
</head>
<body>
<?php include('pages/header.php')?>
<!----- Banner begins -----> 
<div id="banner" class="wrapper">
  <div class="left">
    <table>
    	<tr>
          <td width="10"></td>
       	  <td width="90">Property Type </td>
          <td width="5"></td>
          <form action="<?=site_url();?>custom_search" method="post" name="myform">
        	<td width="160">
            <select name="ptype">
            <option value="0" selected="selected"> -- Select --</option>
            <option value="Land">Land</option>
            <option value="Apartment">Apartment</option>
            <option value="Residential House">Residential House</option>
            <option value="Commercial Property">Commercial Property</option>
            <option value="Villas">Villas</option>
            <option value="Villappartment">Villappartment</option>
            <option value="Row House">Row House</option>
          </select>
          </td>    
          <td width="10"></td> 
          <td width="60">Location</td>
		  <td width="2"></td>
          <td width="150"><input type="text" id="location_list" name="location" required/></td>
          <td width="15"><input type="radio" name="type" value="buy" /></td>
          <td width="23">Buy</td>
          <td width="10"></td>
          <td width="15"><input type="radio" name="type" value="rent"/></td>
          <td width="27">Rent</td>
          <td width="20"></td>
          <td width="73"><input  type="submit" value="Search"/></td>
          </form>
    	</tr>
    </table>
</div>
    <div class="right">
   	  <div class="zone">Zonal Property Search</div>
        <div class="map" align="center"><img src="<?=base_url();?>assets/images/map.png" border="0" usemap="#Map" class="mapper iborderFFFFFF icolor000000" />
<map name="Map" id="Map">
<area shape="poly" coords="45,71,37,59,40,54,34,51,30,42,34,34,39,32,45,32,47,26,47,21,49,14,56,8,62,5,74,13,79,14,88,14,94,19,101,19,105,26,113,27,116,22,123,26,126,27,116,42,108,51,104,60,96,71" href="<?=site_url();?>zonal_search/index/north" alt="north" />
<area shape="rect" coords="45,71,97,117" href="<?=site_url();?>zonal_search/index/Central" />
<area shape="poly" coords="46,117,46,125,43,128,42,133,43,140,43,145,39,152,43,157,45,164,47,171,46,178,45,181,49,178,52,180,56,182,62,182,66,180,69,183,73,185,77,184,80,182,83,179,87,181,91,181,92,176,96,174,97,179,97,171,100,168,103,166,106,164,106,158,105,155,107,151,108,146,102,144,98,145,97,143,97,140,97,137,97,133,98,129,98,127,101,124,104,123,100,119,97,117,96,116,47,116,46,117" href="<?=site_url();?>zonal_search/index/South" />
<area shape="poly" coords="97,116,101,121,104,124,107,124,113,124,118,122,120,118,126,114,128,111,127,106,130,102,135,99,140,96,139,92,136,88,136,83,137,77,140,71,144,70,146,67,144,64,145,60,148,56,151,53,152,50,151,44,149,43,145,41,143,38,138,40,135,38,131,36,127,35,129,31,127,28,124,26,123,32,119,36,116,41,113,44,110,48,106,53,103,61,101,66,96,70,96,72,96,115,97,117" href="<?=site_url();?>zonal_search/index/East " alt="east" />
<area shape="poly" coords="27,42,22,43,23,52,18,54,15,54,14,59,9,61,7,65,8,71,6,77,8,82,11,82,13,81,17,83,21,87,21,91,17,93,16,97,18,101,22,104,18,110,12,116,7,120,7,126,12,130,13,136,13,145,15,150,18,154,21,157,22,153,25,152,27,151,30,153,32,151,36,151,37,151,39,150,41,147,42,145,42,138,42,131,42,128,45,125,44,118,45,114,45,71,43,67,43,65,39,62,38,57,38,55,34,53,32,48,29,45,27,41" href="<?=site_url();?>zonal_search/index/West" alt="west" />
</map></div>
  </div>
</div>
<!----- Banner ends -----> 
<!----- Content begins -----> 
<div id="content" class="wrapper">	
 	<!----- Content -left begins -----> 
	<div class="left">
        <!----- Image slider -----> 
    	<div class="a">

                	<?php
					//$run->db_open();
					//$query = mysql_query("SELECT i.* ,p.tit,p.loc FROM image i JOIN properties p ON i.pid=p.id where thumbs=2 order by pid desc;");										
					//$no = mysql_num_rows($query);
						$count=count($result);
						foreach($result as $row)
					{
						
					   $fname=$row['fname'];	
						$pid=$row['pid'];	
						$tit=$row['tit'];
						$loc=$row['loc'];
						$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
						echo '<ul id="marqueeUl"><li id="marqueeLi"><a href="'.site_url().'slide_property/index/'.$pid.'"><img src="'.base_url().'uploads/thumbs/'.$fname.'" title="'.$tit.'('.$loc.')"/></a></li></ul>';
	
					}
                  ?>
      </div>
        <!----- Property Updates -----> 
        <div id="property">
        	<div class="title">Property Updates</div>
    				<div class="updates">
						<ul  class="ui-icon-bullet">
                        <?php
						
						foreach($proupdate as $pro){
							if(empty ($pro))
                            {
                                echo '<li>No records found</li>';
                            }
			                 else
                            {
                                $id=$pro['id'];
                                $type=$pro['type'];
								$link=$pro['link'];
                                $msg=$pro['msg'];
								if($type=="link")
								{
									echo '<li>* <a href="'.$link.'" target="_blank">'.$msg.'</a></li>';
								}
								else
								{
									echo '<li>* <a href="'.site_url().'property_updates">'.$msg.'</a></li>';
								}
                            }
						}
                   
						?>
					   </ul>
    				</div>
        	</div>
        <div class="more"><input type="button" value="Read more" onclick="parent.location='<?=site_url();?>property_updates'" /></div>
        <!----- Featured Project -----> 
   	    <div id="featured_project">
        	<div class="title">Featured Projects</div>  
			<?php
				//$query = mysql_query("SELECT f.*, i.*, p.*  FROM ((fp f LEFT JOIN image i ON f.PID = i.PID)LEFT JOIN properties p ON i.PID = p.ID)");
                foreach($featurepro as $fea){
				if(empty ($fea))
                            {
                                echo '<div class="td">No records found</div>';
                            }
							else
                            {
                                $pid=$fea['pid'];
								$tit=$fea['tit'];	
								$loc=$fea['loc'];
								$ptype=$fea['ptype'];
								$banner=$fea['banner'];
								$thumbs=$fea['thumbs'];
								$text=$fea['text'];
								if($ptype == 'Commercial Property') $ptype = 'Commercial';

								$tit=substr($fea['tit'], 0, 15); $tit1=strlen($tit);
								if($tit1 == 17) $tit1='...'; else $tit1='';
								
								$loc=substr($fea['loc'], 0, 15); $loc1=strlen($loc);
								if($loc1 == 17) $loc1='...'; else $loc1='';	
								$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
								echo '<a href="'.site_url().'project_details/index/'.$pid.'" target="_blank">
									  <div class="box">
									  <img src="'.base_url().'/thumbs/'.$thumbs.'"/>
									  <div>'.$tit; echo $tit1.'<br />'.$ptype.'<br />'.$loc; echo $loc1.'</div>
									  <div>more...</div>
									  </div>
									  </a>';
                            }
				}
                          ?>
             
    	</div>
	</div>
    <!----- Content -left ends -----> 
    <!----- Content -right begins -----> 
    <div class="right">
		<div class="id_search">
        	<table>
            	<tr><td colspan="2" style="font-size:10px;" id="h1">
				<?php
				/* 				  
					if($a == '1i0')echo'<div class="red" id="h1">* Enter Property id</div>';
					if($a == '8i8')echo'<div class="red" id="h1">* Invalid Property id</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server error</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('invalid');?></div>
				<div class="red" id="h1"><?php echo $this->session->flashdata('invalid_pro');?></div>
				</td></tr>
            	<tr>
                	<?php echo form_open('id_search');?>
        			<td><input type="text" value="Search by id" 
					onBlur="if(this.value=='')this.value='Search by id'" 
					onfocus="if(this.value=='Search by id')this.value=''" name="b" /></td>
            		<td><input type="submit" value="Search" />
					<?php echo form_close();?>
					</td>
            	</tr>
            </table>
        </div>
        <br /><br /><br />
        <?php include("pages/ads.php");?> 
    </div>
    <!----- Content -right ends -----> 
    <div class="clear"></div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer" style="z-index:100;">
	<?php include("pages/footer.php");?>
</div> 
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.addValidation("ptype","dontselect=0","Please select the property type");
  
  
//]]></script>
<script type="text/javascript">
	jQuery.fn.extend({
        pic_scroll:function (){
            $(this).each(function(){
                var _this=$(this);
                var ul=_this.find("ul");
                var li=ul.find("li");
                var w=li.size()*li.outerWidth();
                li.clone().prependTo(ul);
                ul.width(2*w);
                var i=1,l;
                _this.hover(function(){i=0},function(){i=1});
                function autoScroll(){
                	l = _this.scrollLeft();
                	if(l>=w){
                		_this.scrollLeft(0);
                	}else{
                		_this.scrollLeft(l + i);
                	}
                }
                var scrolling = setInterval(autoScroll,30);
            })
        }
    });
	$(function(){
		// var time1 = new Date;
		$(".a").pic_scroll();
		// console.log("耗时：" + (new Date - time1) + " 毫秒");
	})

	</script>

</body>
</html>
