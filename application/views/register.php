<?php /* require_once('accounts/action/jcode.php'); 
	  $run->error();
	  if(!empty($_REQUEST['1'])) $email=base64_decode($_REQUEST['1']);
	  if(!empty($_REQUEST['2'])) $fname=base64_decode($_REQUEST['2']);
	  if(!empty($_REQUEST['3'])) $add=base64_decode($_REQUEST['3']);
	  if(!empty($_REQUEST['4'])) $city=base64_decode($_REQUEST['4']);
	  if(!empty($_REQUEST['5'])) $cont=base64_decode($_REQUEST['5']);
	  if(!empty($_REQUEST['6'])) $zip=base64_decode($_REQUEST['6']);
	  if(!empty($_REQUEST['7'])) $mobi=base64_decode($_REQUEST['7']);
	  if(!empty($_REQUEST['8'])) $cname=base64_decode($_REQUEST['8']);
	  if(!empty($_REQUEST['9'])) $webs=base64_decode($_REQUEST['9']); */
	  defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php'); ?>
</head>


<body>
<!----- Header_2 begins ----->
<?php include('pages/header.php')?>
<!----- Header_2 ends ----->
	<script>
		$(document).ready(function(){
			$('.refreshCaptcha').on('click', function(){
				$.get('<?php echo base_url().'register/refresh'; ?>', function(data){
					$('#captImg').html(data);
				});
			});
		});
	</script>
<div id="content" class="wrapper">
<br />
  <div id="parea">
    	<div class="ptitle">User Registration</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				/*     $run->error();
					$a=$_REQUEST['a'];
					if($a == '1i0')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == '8i2')echo'<div class="red" id="h1">* Email id is already registered</div>';
					if($a == '1mi')echo'<div class="red" id="h1">* Password Mismatched</div>';
					if($a == '8i8')echo'<div class="red" id="h1">* Invalid security code</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>'; */
					
				?>
                </div>
			    <div style="margin:0 auto; width:410px;">
        		<form method="post" action="<?=site_url();?>register/registration" name="myform" id="myform">

              <table>
                <tr>

                  <td class="tdname">Email Id*<br /><span class="gre" style="font-size:9px;">(used as Username)</span></td><td width="10"></td><td width="155">
                  <input type="text" class="tdbox" name="email" value="<?php echo set_value('email'); ?>"/><span id="email_error" style="color:red"><?php echo form_error('email');?></span> 
</td>
       		  </tr>
                
              <tr>
                  <td class="tdname">Password*</td><td width="10"></td>
                  <td ><input type="password" class="tdbox" name="pass1" /></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Confirm password*</td><td width="10"></td>
                  <td ><input type="password" class="tdbox" name="pass2" /></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Full Name*</td> <td width="10"></td>
                  <td ><input type="text" class="tdbox" name="name"  value="<?php echo set_value('name'); ?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Address*</td><td width="10"></td>
                  <td ><input type="text" class="tdbox"  name="add" value="<?php echo set_value('add'); ?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">City*</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="city" value="<?php echo set_value('city'); ?>" /></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Country*</td><td width="10"></td>
                  <td ><input name="coun" type="text" class="tdbox" id="coun" value="<?php echo set_value('coun'); ?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Zipcode*</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="zip" value="<?php echo set_value('zip'); ?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Mobile*</td><td width="10"></td>
                  <td ><input type="text" class="tdbox"  name="mobile" value="<?php echo set_value('mobile');?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Company Name</td><td width="10"></td>
                  <td ><input type="text" class="tdbox"  name="cname" value="<?php echo set_value('cname'); ?>"/></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Website</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="site" value="<?php echo set_value('site'); ?>"/></td>
       	  	  </tr>
             
             <tr>
                  <td class="tdname"></td><td width="8"></td>
                  <td id="captImg"><?php echo $captchaImg; ?></td>
				  <td><a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a></td>
       	  	  </tr>
             
             <tr>
                  <td class="tdname">Security Code</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="captcha" id="security_code" required/></td>
       	  	  </tr>
              
              <tr>
                <td class="tdname"></td><td width="10"></td>
                  <td><input type="submit"  class="submit" value="Submit" /><input type="reset"  class="reset" value="Reset" /></td>
              </tr>
             </table>
             </form>
               </div>	
   	  </div>
      <div class="clear"></div>
   </div>
</div>
<!----- Content ends -----> 

<script language="JavaScript" type="text/javascript" xml:space="preserve">
//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  
  frmvalidator.addValidation("email","email","Email entered is Invalid");
  frmvalidator.addValidation("email","maxlen=40" ,"The Maximum length of Email id is 40");
  
  frmvalidator.addValidation("pass1","maxlen=40" ,"The Maximum length of Password is 40");
  frmvalidator.addValidation("pass1","minlen=6" ,"The Minimum length of Password is 6");
  
  frmvalidator.addValidation("pass2","maxlen=40" ,"The Maximum length of Password is 40");
  frmvalidator.addValidation("pass1","minlen=6" ,"The Minimum length of Password is 6");

  frmvalidator.addValidation("pass2","eqelmnt=pass1","The confirmed password is not same as password");
  frmvalidator.addValidation("pass1","neelmnt=email","The password should not be same as username");
  
  frmvalidator.addValidation("name","alpha","Name should be alphabetic chars only"); 
  
  frmvalidator.addValidation("city","alpha","City name should be alphabetic chars only");
  
  frmvalidator.addValidation("count","alpha","Country name should be Alphabetic chars only");
  
  frmvalidator.addValidation("zip","numeric","Zipcode should be in numbers");
  frmvalidator.addValidation("zip","maxlen=6","The Maximum length of Zipcode is 6");
   
  frmvalidator.addValidation("mobile","numeric","Only numbers are allowed for Mobile no");
  frmvalidator.addValidation("mobile","maxlen=10","The Maximum length of Mobile no is 10");
  frmvalidator.addValidation("mobile","minlen=10","The mobile no should be in 10 digit");

  frmvalidator.addValidation("site","maxlen=40","The Maximum length of url is 40");
  frmvalidator.addValidation("site","url","Url entered is Invalid");
//]]>
</script>
<script>
$(window).load(function(){
  setTimeout(function(){ $('#email_error').fadeOut() }, 2000);
});
</script>
<!----- Footer begins ----->
<div id="footer">
	<?php include("pages/footer.php");?>
</div> 

</body>
</html>
