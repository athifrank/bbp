<?php 
//require_once('accounts/action/jcode.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('pages/head')?>
</head>
<style>
.contact{float:left; width:410px; margin:30px 0 0 50px;}
.contact a{ color:#eb7200;}
</style>

<body>
<?php $this->load->view('pages/header')?>


	<script>
		$(document).ready(function(){
			$('.refreshCaptcha').on('click', function(){
				$.get('<?php echo base_url().'register/refresh'; ?>', function(data){
					$('#captImg').html(data);
				});
			});
		});
	</script>
<!----- Banner begins ----->
<div id="content" class="wrapper">
 <br />
  <div id="parea">
        	<div class="ptitle">Contact us<input type="button"  onclick="history.back();"/></div>
            <div class="display_msg">
            </div>
            <div style="float:left; width:410px; margin-left:50px; border-right:#eee 1px solid;" class="pcontent">
            <div class="display_msg"><div id="myform_errorloc" class="red"></div>
                <?php
				/*     $run->error();
					$a=$_REQUEST['a'];
					if($a == 'ki0')echo'<div class="gre" id="h1">* Feedback successfully sent</div>';
					if($a == '8i8')echo'<div class="red" id="h1">* Invalid security code</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* SMTP error try again later</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('feed');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
            </div>
        		<form method="post" action="<?=site_url();?>contactus/feedback" name="myform" id="myform">
              <table height="330">
              <tr>
                  <td class="tdname">Full Name</td> <td width="10"></td>
                  <td ><input type="text" class="tdbox" name="name" /></td>
       	  	  </tr>
              
               <tr>
                  <td class="tdname">Email Id*</td><td width="10"></td><td width="155">
                  <input type="text" class="tdbox" name="eid" /></td>
       		  </tr>
              
              <tr>
                  <td class="tdname">Mobile</td><td width="10"></td>
                  <td ><input type="text" class="tdbox"  name="mobile" /></td>
       	  	  </tr>
              
              <tr>
                  <td class="tdname">Feedback*</td><td width="10"></td>
                  <td ><textarea name="feed" id="feed" style="width: 201px; height: 60px;"></textarea></td>
       	  	  </tr>
             
              <tr>
                  <td class="tdname"></td><td width="8"></td>
                  <td id="captImg"><?php echo $captchaImg; ?></td>
				  <td><a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a></td>
       	  	  </tr>
             
             <tr>
                  <td class="tdname">Security Code*</td><td width="10"></td>
                  <td ><input type="text" class="tdbox" name="captcha" id="security_code" /></td>
       	  	  </tr>
              
              <tr>
                <td class="tdname"></td><td width="10"></td>
                  <td><input type="submit"  class="submit" value="Submit" /><input type="reset"  class="reset" value="Reset" /></td>
              </tr>
             </table>
             </form>
             <br /><br /><br />
          </div>
	<div class="contact">
          For General enquiries information send us mail at<br />
      <a href="mailto:contact@bangalorebestproperty.com"><br />
      contact@bangalorebestproperty.com</a><br /><br /><br />
          
          For posting advertisements, send us the details at<br /><br />
      <a href="mailto:ads@bangalorebestproperty.com">ads@bangalorebestproperty.com</a><br /><br /><br />
          
          Contact No: <a href="#">+91-9845276059</a>
          </div>
                
      </div>
	<div class="clear"></div>
</div>
</div>
<!----- Content ends -----> 
<script language="JavaScript" type="text/javascript" xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.EnableOnPageErrorDisplaySingleBox();
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("name","alpha_s","Name should be alphabetic chars only"); 
  
  frmvalidator.addValidation("eid","maxlen=50","Email-id should be within 50 characters");
  frmvalidator.addValidation("eid","req","Email-id is required");
  frmvalidator.addValidation("eid","email","Enter a valid email-id");
  
  frmvalidator.addValidation("feed","req","Feedback is required");
  
  frmvalidator.addValidation("security_code","req","Security code is required");
   
  frmvalidator.addValidation("mobile","numeric","Only numbers are allowed for Mobile no");
  
//]]>
</script>
<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
