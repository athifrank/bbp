<?php require_once('action/jcode.php');
	 $run->error();
	 $a=$_REQUEST['a'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('pages/head.php'); ?>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_2" class="wrapper" style="height:60px;">
  <div class="logo"><img src="../images/logo.png" /></div>
    <div class="menu"><a href="../index.php"><img src="../images/home.png" border="0" /></a></div>
    </div>
    
<!----- Header_2 ends ----->

<div id="content" class="wrapper">	
   <?php
   	if($a ==1)
		echo '<div class="text" align="center"><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div style="margin:0 auto; width:500px; border:#093 1px solid; padding:20px;" class="text">
          User Registration Completed. please click <a href="index.php">here</a>to login.</div> </div>';
    else
		echo '<div class="text" align="center"><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div style="margin:0 auto; width:500px; border:#ccc 1px solid; padding:20px;" class="text">
          Page cannot be viewed.</div> </div>';
    ?>
    
</div>

<!----- Footer begins ----->
<div id="footer">
	<?php include("../pages/footer.php");?>
</div> 

</body>
</html>
