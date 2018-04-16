<?php 
       /* require_once('action/jcode.php'); 
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
<?php $this->load->view('accounts/pages/head');?>
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
        	<div class="ptitle">Edit Details </div>
            <div class="pcontent">
               <div class="display_msg">
                <?php
				 /*    $run->error();
					$a=$_REQUEST['a'];
					if($a == '1i0')echo'<div class="red" id="h1">* All fields are required</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('all');?></div>
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
        	<form action="<?=site_url();?>edit_profile/edit" method="post"  name="myform" id="myform">
        
            <table width="350" height="400">
            <tr><td width="130">Name</td><td width="10">:</td><td width="260"><?php echo $name;?></td></tr>
            <tr><td>E-mail Id</td><td>:</td><td><?php echo $email;?></td></tr>
            <tr><td>Address</td><td>:</td><td><input type="text" name="add" value="<?php echo $add;?>"  /></td></tr>
            <tr><td>City</td><td>:</td><td><input type="text" name="city" value="<?php echo $city;?>"  /></td></tr>
            <tr><td>Zipcode</td><td>:</td><td><input type="text" name="zip" value="<?php echo $zipcode;?>"  /></td></tr>
            <tr><td>Country</td><td>:</td><td><input type="text" name="coun" value="<?php echo $country;?>"  /></td></tr>
            <tr><td>Mobile</td><td>:</td><td><input type="text" name="mobi" value="<?php echo $mobile;?>"  /></td></tr>
            <tr><td>Company Name</td><td>:</td><td><input type="text" name="cname" value="<?php echo $cname;?>"  /></td></tr>
            <tr><td>Website</td><td>:</td><td><input type="text" name="url" value="<?php echo $website;?>"  /></td></tr>
            <tr><td>Member since</td><td>:</td><td><?php echo $date;?></td></tr>
            <tr><td class="tdname" height="40"></td><td width="10">
            </td><td><input type="submit"  value="Update" /> </td></tr>
            </table>
            </form>
        </div>	
				 <?php } ?>
        
   	  </div>
  </div>
</div>
<!----- Content -left ends -----> 
    <!----- Content -right begins -----><!----- Content -right ends -----> 
</div>
<!----- Content ends -----> 
<script language="JavaScript" type="text/javascript" xml:space="preserve">
//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
   
  frmvalidator.addValidation("city","alpha","City name should be alphabetic chars only");
  
  frmvalidator.addValidation("coun","alpha","Country name should be Alphabetic chars only");
  
  frmvalidator.addValidation("zip","numeric","Zipcode should be in numbers");
  frmvalidator.addValidation("zip","maxlen=6","The Maximum length of Zipcode is 6");
   
  frmvalidator.addValidation("mobi","numeric","Only numbers are allowed for Mobile no");
  frmvalidator.addValidation("mobi","maxlen=10","The Maximum length of Mobile no is 10");
  frmvalidator.addValidation("mobi","minlen=10","The mobile no should be in 10 digit");

  frmvalidator.addValidation("url","maxlen=40","The Maximum length of url is 40");
  frmvalidator.addValidation("url","url","Url entered is Invalid");
//]]>
</script>
<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
