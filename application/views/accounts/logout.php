<?php 
    /* require_once('action/jcode.php');
	  session_start(); */
	   defined('BASEPATH') OR exit('No direct script access allowed');
	  $_SESSION['user'] = '';
	  $_SESSION['name'] = '';
	  $_SESSION['id'] = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('pages/head'); ?>
<style>
.temp {
	margin:0px auto;
	background-image:url(<?=base_url();?>assets/images/login2.jpg);
	background-repeat:no-repeat;
	width:350px;
	height:200px;
	color:#333333;
	font-size:14px; }
	
input[type=submit]{
	background-image:url(<?=base_url();?>assets/images/b_login.jpg);
	background-repeat:no-repeat;
	width:60px;
	height:19px;
	border:0; }
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
 	<!----- Content -left begins ----->
    <div class="text" align="center">
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div style="margin:0 auto; width:500px; border:#cccccc 1px solid; padding:20px;" class="text">
          Logout sucessfully done. Please click <a href="<?=site_url();?>login" style="color:#85da05;">here</a> to login again.
      </div>
    </div>
  <!----- Content -left ends -----> 
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
