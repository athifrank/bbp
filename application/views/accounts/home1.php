<?php 
 /*     require_once('action/jcode.php');
	  $run->admin_login_check(); */ 
	   defined('BASEPATH') OR exit('No direct script access allowed');
	  	if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) 
		{
			$this->load->view('accounts/page_expired1');
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
  	<div class="ptitle">Admin Home</div>
    	<div class="pcontent">
        <div class="display_msg"></div>
            <span style="text-transform:capitalize;">User: <?php echo $_SESSION['admin_name']; ?></span><br /><br />
            Welcome to Bangalore Best property Admin portal<br /><br /><img src="<?=base_url();?>assets/images/lock.png" /> Please logout before leaving this page
        </div>
    </div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
