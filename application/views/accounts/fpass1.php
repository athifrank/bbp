<?php require_once('action/jcode.php');
	 $run->error();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php'); ?>
<style>
.login {background-image:url(../images/login.png);background-repeat:no-repeat;width:350px;height:200px;margin:0px auto;color:#333333;
font-size:14px;}
.login_head{padding:15px 0 0 20px; color:#2688ed; font-weight:bolder; font-size:12px; font-family: 'Arial Black', Gadget, sans-serif;text-transform:uppercase;}
.fpass{text-align:center;}
.fpass a{text-decoration:none; color:#060; font-weight:bold; cursor:help;font-size:12px;}
</style>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_2" class="wrapper" style="height:60px;">
  <div class="logo"><img src="../images/logo.png" /></div>
    <div class="menu"><a href="../index.php"><img src="../images/home.png" border="0" /></a></div>
    </div>
    
<!----- Header_2 ends ----->

<div id="content" class="wrapper">	
 	<!----- Content -left begins ----->
    <br /><br /> 
	<div class="login">
    		<div class="login_head">Forgot Password</div>
            <div style="padding:10px 0 0 50px;">
        	<form action="action/fpass1.php" method="post">
        	<table width="243" height="101">

               <tr>
                <td style="color:#FF0000; text-align:center;" height="17">
                  <?php
						$a=$_REQUEST[a];
						if($a =='8i5')
						{echo'<div class="red" id="h1">Email ID is required</div>';}
						if($a =='8i2')
						{echo'<div class="red" id="h1">Invalid Email-Id entered</div>';}
						if($a =='i86')
						{echo'<div class="red" id="h1">SMTP server error Please try later</div>';}
					?>
                </td>
              </tr>
              
				<tr><td height="30">E-mail address/User-id</td></tr>
                <tr><td height="30"><input type="text" name="mail" class="tdbox" style="border:#666 1px solid;" /></td></tr>
                <tr><td height="40"><input type="submit" value="Submit" /> <input type="button" value="Cancel" onclick="parent.location='index1.php'" /></td></tr>
            </table>
          </form>
          </div>
        </div>
<!----- Content -left ends -----> 
    <!----- Content -right begins ----->
  <!----- Content -right ends -----> 
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php include("../pages/footer.php");?>
</div> 

</body>
</html>
