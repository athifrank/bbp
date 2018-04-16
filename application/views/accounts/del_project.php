<?php 
/*      require_once('action/jcode.php'); 
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
		<?php $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
  	<div class="ptitle">Delete user</div>
       <?php
		/* 	$id=$_REQUEST['b'];
			$run->db_open(); 
		 	$query = mysql_query("SELECT tit FROM fp where pid=$id");
		 	$row = mysql_fetch_array($query);
			$name=$row['tit'];
			
			$query = mysql_query("SELECT count(pid) p FROM `gallery` WHERE pid=$id");
			$row = mysql_fetch_array($query);
			$check=$row['p']; */
			if($check == 0)
			{
		?>
        
        <div style="border:#CCCCCC 1px solid; width:450px; margin:40px auto; height:100px;">
		<div style="background-color:#f0f0f0; height:20px; padding:5px; border-bottom:#CCCCCC 1px solid;">
        	Are you sure to delete the Project : <?php echo $name; ?> 
        </div>
        <div align="center"><form action="<?=site_url();?>manage_projects/del_action1"><table width="144" height="64" >
       <tr><td><input type="hidden" value="<?php echo $id; ?>" name="id" /><input type="submit" value=" Yes "/>
       </td><td><input type="button" value=" No " onclick="window.location.href='<?=site_url();?>manage_projects'"/></td></tr></table></form></div>
     </div>
     <?php	} else { ?>
        
      
       <div style="border:#CCCCCC 1px solid; width:450px; margin:40px auto; height:100px;">
		<div style="background-color:#f0f0f0; height:20px; padding:5px; border-bottom:#CCCCCC 1px solid;">
        
        	The Project "<?php echo $name; ?>" cannot be deleted
        </div>
        <div align="center"><table width="418" height="64" >
       <tr><td>Error: Please remove the gallery files associative with this project</td></tr>
       <tr>
       <td><input type="button" value=" Back " onclick="window.location.href='<?=site_url();?>manage_projects'"/></td></tr></table></form></div>
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
