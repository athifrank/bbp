<?php
/*       require_once('action/jcode.php'); 
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
		<?php  $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
        	<div class="ptitle">Delete user</div>
      <div style="border:#CCCCCC 1px solid; width:450px; margin:40px auto; height:100px;">
		<div style="background-color:#f0f0f0; height:20px; padding:5px; border-bottom:#CCCCCC 1px solid;">
        <?php
			/* $id=$_REQUEST['b'];
			$run->db_open();
		 	$query = mysql_query("SELECT * FROM knowledge_house where id=$id");
			$run->db_close();
		 	$row = mysql_fetch_array($query);
			$title=$row['title']; */
		?>
        	Are you sure to delete the Knowledge House : <?php echo $title; ?> 
        </div>
        <div align="center"><form action="<?=site_url();?>manage_knowledge_house/del_action"><table width="144" height="64" >
       <tr><td><input type="submit" value=" Yes "/><input type="hidden" value="<?php echo $id; ?>" name="id" />
       </td><td><input type="button" value=" No " onclick="history.back()"/></td></tr></table></form></div>
     </div>
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
