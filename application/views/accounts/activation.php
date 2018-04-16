<?php 
 /*    require_once('action/jcode.php');
	 $run->error();
	 $email=$_REQUEST['id'];
	 $code=$_REQUEST['code'];
	 $br ='<br><br><br><br><br><br><br><br>'; */
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('pages/head'); ?>
<style>
.dis{ margin:0px auto; width:500px; border:#ccc 1px solid; padding:20px; text-align:center; color:#666666; font-size:14px;}
</style>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_2" class="wrapper" style="height:60px;">
  <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu"><a href="<?=site_url();?>index"><img src="<?=base_url();?>assets/images/home.png" border="0" /></a></div>
    </div>
    
<!----- Header_2 ends ----->

<div id="content" class="wrapper">	
   <?php
   	if(isset($already)){
		echo $already;
	}
	if(isset($activate)){
		echo $activate;
	}
	if(isset($page)){
		echo $page;
	}
	if(isset($view)){
		echo $view;
	}
    ?>
    
</div>

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
