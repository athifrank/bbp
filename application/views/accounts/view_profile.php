<?php 
  /*   require_once('action/jcode.php'); 
	  $run->user_login_check();
	  session_start();
	  $uid=$_SESSION['id']; */
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
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view("accounts/pages/user_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
        	<div class="ptitle">User Details</div>
            <div class="pcontent">
            <div class="display_msg">
            	<?php
				  /*   $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'k10')echo'<div class="gre" id="h1">* Profile updated Successfully</div>'; */
				?>
				<div class="red" id="h2"><?php echo $this->session->flashdata('server');?></div>
				<div class="red" id="h1"><?php echo $this->session->flashdata('success');?></div>
            </div>
              <?php 
				foreach($pro as  $row){
				$name=$row['name'];
				$email=$row['eid'];
				$add=$row['add'];
			    $city=$row['city'];
				$country=$row['coun'];
				$zipcode=$row['zip'];
				$mobile=$row['mobi'];
				$cname=$row['cname'];
				$website=$row['url'];
				$date=$row['date'];
		?>
        <div style="margin:0px auto; width:350px;">
            <table width="350" height="400">
            <tr><td width="130">Name</td><td width="10">:</td><td width="260"><?php echo $name;?></td></tr>
            <tr><td>E-mail Id</td><td>:</td><td><?php echo $email;?></td></tr>
            <tr><td>Address</td><td>:</td><td><?php echo $add;?></td></tr>
            <tr><td>City</td><td>:</td><td><?php echo $city;?></td></tr>
            <tr><td>Zipcode</td><td>:</td><td><?php echo $zipcode;?></td></tr>
            <tr><td>Country</td><td>:</td><td><?php echo $country;?></td></tr>
            <tr><td>Mobile</td><td>:</td><td><?php echo $mobile;?></td></tr>
            <tr><td>Company Name</td><td>:</td><td><?php echo $cname;?></td></tr>
            <tr><td>Website</td><td>:</td><td><?php echo $website;?></td></tr>
            <tr><td>Member since</td><td>:</td><td><?php echo $date;?></td></tr>
            <tr><td></td><td></td><td><input type="button" onclick="window.location.href='<?=site_url();?>edit_profile'" value="Edit"/></td></tr>
            </table>
        </div>	
				<?php } ?>
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
