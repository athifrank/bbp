<?php 
//require_once('accounts/action/jcode.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php')?>
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
        
<style>
.gallery
{
	float:left;
	width:150px;
}
</style>
</head>
<body>
<?php include('pages/header.php')?>
<!----- Banner begins -----> 
<div id="content" class="wrapper">
	<?php
	foreach($show_project as $row){
        $pid=$row['pid'];
		$tit=$row['tit'];	
		$loc=$row['loc'];
	    $ptype=$row['ptype'];
		$banner=$row['banner'];
		$thumbs=$row['thumbs'];
		$text=$row['text'];
	}
    ?>
  <div>
  <br />
    <?php
		if($banner == 'no.jpg')
		{
	?>
  	<div style="width:992px; text-align:center; border:#CCCCCC 2px solid; height:150px; font-size:24px; color:#CCCCCC; padding-top:100px;">Image not found</div>
    <?php } else {?>
    <img src="<?=base_url();?>/<?php echo $banner; ?>" /></div>
    <?php } ?>
    <br />
    <div id="parea">
    <div class="ptitle"><?php echo $tit; ?></div>
    <div class="pcontent"><?php echo $text; ?></div>
  	</div>
    
    <div id="parea">
    <div class="ptitle">Gallery</div>
    <div class="pcontent">
        <?php
   
		if(empty ($show_project2))
        {
           echo '<div>Gallery will be updated soon</div>';
        }
		else
		{
		  foreach($show_project2 as $row)
		  {
			  $tit=$row['tit'];
			  $fname=$row['fname'];
			  
			  
			  echo'<div class="gallery">
			  <table width="150">
				  <tr><td>
				  <a rel="example_group" href="'.base_url().'savefiles/'.$fname.'">
				  <img src="'.base_url().'thumbs/'.$fname.'" title="'.$tit.'" /></a></td></tr>
				  <tr><td>'.$tit.'</td></tr>
			  </table>
			  </div>';
		  }
		}
		
		?>
	</div>
  	</div>
    
    <div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("pages/footer.php");?>
</div> 

</body>
</html>
