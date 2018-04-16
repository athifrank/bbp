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
        	<div class="ptitle">Message Details<input type="button"  onclick="history.back();"/></div>
            <div class="pcontent">
               <div class="display_msg">
                </div>
              <?php 
	  		/* 	$run->db_open();
		 		$id=$_REQUEST['b'];
		 		$query = mysql_query("SELECT * FROM news where id=$id");
				$run->db_close();
		 		$row = mysql_fetch_array($query);
				$type=$row['type'];
				$msg=$row['msg'];
				$url=$row['link']; */
				foreach($ro as $row ){
					$type=$row['type'];
				$msg=$row['msg'];
				$url=$row['link'];
		?>
      <div>
        <div style="margin:0px auto; width:500px;">
            <table width="500" height="100">
            <tr><td height="10" class="bold">Message</td></tr>
            <tr><td><?php echo $msg;?></td></tr>
            <?php 
				if($type === 'link')
				  echo '<tr><td height="10" class="bold">Url</td></tr><tr><td height="10">'.$url.'</td></tr>';
				  else
				   echo '';
			?>
            </table>
            </form>
        </div>	
   	  </div>
	  <?php } ?>
  </div>
  </div>
<!----- Content -left ends -----> 
    <!----- Content -right begins -----><!----- Content -right ends -----> 
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php $this->load->view("pages/footer");?>
</div> 

</body>
</html>
