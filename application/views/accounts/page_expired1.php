<?php 
//require_once('action/jcode.php');
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
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
          Your Session has Expired. Please click <a href="<?=site_url();?>admin" style="color:#85da05;">here</a> to login again.
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
