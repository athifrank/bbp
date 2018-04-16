<?php 
/*       require_once('action/jcode.php'); 
	  $run->user_login_check(); */
	  	      defined('BASEPATH') OR exit('No direct script access allowed');
	   	if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) 
		{
			$this->load->view('accounts/page_expired');
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
    <div class="logo"><img src="<?=site_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view("accounts/pages/user_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
    	<div class="ptitle">Change Password</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				/*     $run->error();
					$a=$_REQUEST['a'];
					if($a == '1i0')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == '1mi')echo'<div class="red" id="h1">* Old password mismatch</div>';
					if($a == '1ji')echo'<div class="red" id="h1">* New password mismatch</div>';
					if($a == '2ji')echo'<div class="red" id="h1">* Minimum password length is 6</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* New password Updated</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('all');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('newu');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('server');?></div>
				<div class="red" id="h4"><?php echo $this->session->flashdata('newm');?></div>
				<div class="red" id="h5"><?php echo $this->session->flashdata('minimum');?></div>
				<div class="red" id="h6"><?php echo $this->session->flashdata('old');?></div>
                </div>
                <form action="<?=site_url();?>change_pass/cpass" method="post">
			    <div style="margin:0 auto; width:410px;"><table width="410">
        		<tr>
                  <td width="100" height="35" class="tdname">Current Password*</td>
              	  <td width="10"></td>
                  <td width="200" ><input type="password" class="tdbox" name="opword"/></td>
       	  	  	</tr>
                
              <tr>
                  <td class="tdname" height="35">New Password*</td><td width="10"></td>
                  <td ><input type="password" class="tdbox" name="npword"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname" height="35">Confirm password*</td><td width="10"></td>
                  <td ><input type="password" class="tdbox" name="cnpword" /></td>
       	  	  </tr>
                          
              <tr>
                  <td class="tdname" height="40"></td><td width="10"></td>
                  <td><input type="submit"  value="Save" /> <input type="reset"  value="Reset" /></td>
              </tr>
             </table>
             </div>
             </form>		
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
