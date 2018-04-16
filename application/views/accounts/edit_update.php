<?php
/*     require_once('action/jcode.php'); 
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
        	<div class="ptitle">Edit Details<input type="button"  onclick="window.location.href='<?=site_url();?>manage_updates'"/></div>
            <div class="pcontent">
               <div class="display_msg">
                <?php
			/* 	    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* New details Updated</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('all');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('new');?></div>
				<div class="gre" id="h3"><?php echo $this->session->flashdata('server');?></div>
                </div>
              <?php 
	  			/* $run->db_open();
		 		$id=$_REQUEST['b'];
		 		$query = mysql_query("SELECT * FROM updates where id=$id");
				$run->db_close();
		 		$row = mysql_fetch_array($query); */
				foreach($ro as $row){
				$type=$row['type'];
				$msg=$row['msg'];
				$url=$row['link'];
				
		?>
      <div>
        <div style="margin:0px auto; width:500px;">
        	<form action="<?=site_url()?>manage_updates/edit_action" method="post">
            <table width="500" height="120">
            <tr><td height="30" class="bold">Message</td></tr>
            <tr><td><textarea name="msg" style="width:100%;" rows="10"><?php echo $msg;?></textarea></td></tr>
            <?php 
				if($type === 'link')
				  echo '<tr><td class="bold" height="35">Url</td></tr>
				  <tr><td height="30"><input type="text" style="width:100%;" name="url" class="tdbox1" value="'.$url.'"/></td></tr>';
				 else
				   echo '';
			?>
            <tr><td height="30">
            	<input type="hidden" value="<?php echo $type ?>" name="type"  />
            	<input type="hidden" value="<?php echo $id ?>" name="id"  />
            	<input type="submit"  value="Update" /></td></tr>
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
