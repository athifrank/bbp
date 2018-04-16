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
		<?php  $this->load->view("accounts/pages/admin_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
        	<div class="ptitle">Edit Details<input type="button"  onclick="window.location.href='<?=site_url();?>property_documents_admin'"/></div>
            <div class="pcontent">
               <div class="display_msg">
                <?php
				/* 
				    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* New details Updated</div>'; */
				?>
				
				<div id="h1" class="red"><?php echo $this->session->flashdata('all');?></div>
				<div id="h2" class="red"><?php echo $this->session->flashdata('new');?></div>
                <div id="h3" class="red"><?php echo $this->session->flashdata('server');?></div>
                </div>
              <?php 
	  			/* $run->db_open();
		 		$id=$_REQUEST['b'];
		 		$query = mysql_query("SELECT * FROM documents where id=$id");
				$run->db_close();
		 		$row = mysql_fetch_array($query); */
				foreach($ro as $row){
				$id=$row['id'];
				$tit=$row['tit'];
				$fname=$row['fname'];
			?>
      <div>
        <div style="margin:0px auto; width:500px;">
            <form action="<?=site_url();?>property_documents_admin/edit_action" method="post">
            <table width="500" height="120">
            <tr><td height="30" class="bold">Document Title</td></tr>
            <tr><td><input name="tit" type="text" style="width:100%;" value="<?php echo $tit;?>" /></td></tr>
            <tr><td height="30" class="bold">Upload file</td></tr>
            <tr><td height="30" class="bold">Existing file</td></tr>
            <tr><td><?php echo $fname; ?></td></tr>
            <tr><td height="30">
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
