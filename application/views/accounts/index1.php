<?php 
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')){
		 echo '';
	 }
	 else {
		 $this->load->view('accounts/home1');
	 }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('accounts/pages/head'); ?>
<style>
.login {background-image:url(<?=base_url();?>assets/images/login.png);background-repeat:no-repeat;width:350px;height:200px;margin:0px auto;color:#333333;
font-size:14px;}
.login_head{padding:15px 0 0 20px; color:#2688ed; font-weight:bolder; font-size:12px; font-family: 'Arial Black', Gadget, sans-serif;text-transform:uppercase;}
.fpass{text-align:center;}
.fpass a{text-decoration:none; color:#060; font-weight:bold; cursor:help;font-size:12px;}
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
    <br /><br /> 
	<div class="login">
    		<div class="login_head">Admin Login</div>
            <div style="padding:10px 0 0 50px;">
        	<form action="<?=site_url();?>admin/login_admin" method="post">
        	<table width="243" height="101">
                                <tr>
                <td colspan="3" style="color:#FF0000; text-align:center;" height="17">
                  <?php
					/* 	$a=$_REQUEST[a];
						if($a =='23e')
						{echo'<div class="red" id="h1">All the fields are required</div>';}
						if($a =='i85')
						{echo'<div class="red" id="h1">Invalid Username and Password</div>';}  */
					?>
					<div class="red" id="h1"><?php echo $this->session->flashdata('all'); ?></div>
					<div class="red" id="h2"><?php echo $this->session->flashdata('invalid'); ?></div>

                </td>
              </tr>
				<tr>
                	<td height="30">User ID</td>
                    <td></td>
                    <td><input type="text" name="user"/></td>
                </tr>
                
                <tr>
                	<td height="30">Password</td>
                    <td></td>
                    <td><input type="password" name="pass" /></td>
                </tr>
                       
                <tr>
                	<td height="30"></td>
                    <td></td>
                    <td><input type="submit" value="Login" /></td>
                </tr>
                
             <tr>
                <td colspan="3" height="8" class="fpass">
                <a href="fpass1.php">Forgot password</a>
                	</td>
              </tr>
                
            </table>
          </form>
          </div>
        </div>
        <?php
	/* 	if($a =='i87')
        echo'<div class="fpass" style="margin-top:50px;" id="h2"><img src="../images/star.gif" /> 
	<a href="#">New Password has been generated and mailed to your Email address, Please check your mail</a></div>'; */
	?> 
<!----- Content -left ends -----> 
    <!----- Content -right begins ----->
  <!----- Content -right ends -----> 
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
