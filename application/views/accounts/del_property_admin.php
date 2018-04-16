<?php 
/*      require_once('action/jcode.php'); 
	  $run->admin_login_check();
	  $run->error(); */
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
      <div class="pcontent">
		<div class="display_msg">
			<?php
		/* 		$run->error();
				$id=$_REQUEST['b'];
				$run->db_open();
				$query1 = mysql_query("SELECT count(id) as c FROM properties WHERE id=$id");
				$run->db_close();
				$row = mysql_fetch_array($query1);
				$c=$row['c'];
				if(empty($id) || $c == 0)
				{
					echo '<div class="red">*Invaid Input Error #203</div>';
					exit;
				} */
			?>
        </div>
      <div style="border:#CCCCCC 1px solid; width:450px; margin:40px auto; height:100px;">
		<div style="background-color:#f0f0f0; height:20px; padding:5px; border-bottom:#CCCCCC 1px solid;">
        <?php
		/* 	$page=$_REQUEST['c'];
			$run->db_open();
		 	$query = mysql_query("SELECT * FROM properties where id=$id");
			$run->db_close();
		 	$row = mysql_fetch_array($query);
			$tit=$row['tit']; */
		?>
        	Are you sure to delete the Property : <?php echo $tit; ?> 
        </div>
        <div align="center"><form action="<?=site_url();?>delete_property_admin/delete/<?php echo $id; ?>"><table width="144" height="64" >
       <tr><td><input type="submit" value=" Yes "/><input type="hidden" value="<?php echo $id; ?>" name="id" />
       <?php if(!empty($page)){echo'<input type="hidden" value="<?php echo $page; ?>" name="page" />';}?>
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
