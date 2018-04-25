<!----- Header_1 begins 
<div id="header_1">
    <div class="menu_1">
        <a href="index.php">Home</a>|
        <a href="accounts/">Signin</a>|
        <a href="register.php">Register</a>
    </div>
    <div class="menu_2">
		<a href="contactus.php">Contact Us</a>
    </div>
</div>
 Header_1 ends ----->

<!----- Header_2 begins ----->
<div id="header_2" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
	<a href="<?=site_url();?>index">Home</a>|
	<?php 
	if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		echo '<a href="'.site_url().'login">'.$_SESSION['name'].'</a>|';
	}else{
		echo '<a href="'.site_url().'login">Signin</a>|
              <a href="'.site_url().'register">Register</a>|';
	 }
		?>
        <a href="<?=site_url();?>pass" >Post Your Property</a>|
		<a href="<?=site_url();?>contactus">Contact Us</a>
  <!-----      <a href="knowledge_house.php">Knowledge House</a>|
      <a href="property_documents.php">Property Documents</a>|
        <a href="news.php">News</a>----->
    </div>
</div>
<!----- Header_2 ends ----->