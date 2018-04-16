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

	<script type="text/javascript" src="<?=base_url();?>ckeditor/ckeditor.js"></script>
	<script src="<?=base_url();?>ckeditor/_samplessample.js" type="text/javascript"></script>
	<link href="<?=base_url();?>ckeditor/_samplessample.css" rel="stylesheet" type="text/css" />
	
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
        	<div class="ptitle">User Details<input type="button"  onclick="history.back();"/></div>
            <div class="pcontent">
            	<div class="display_msg"></div>
              <?php 
		 		/* $b=$_REQUEST['b'];
				$run->db_open();
		 		$query = mysql_query("SELECT * FROM knowledge_house where id=$b");
				$run->db_close();
		 		$row = mysql_fetch_array($query); */
				foreach($ro as $row){
				$id=$row['id'];
				$content=$row['content'];
				$title=$row['title'];
			    $update_date=$row['update_date'];
				$img=$row['img'];
				$discription=$row['discription'];
		?>
        <div style="margin:0px auto; width:950px;">
            <table width="950" height="400">
            <tr><td>Title</td><td>:</td><td><?php echo $title;?></td></tr>
			<tr><td>&nbsp;</td></tr>
			 <tr><td>Description</td><td>:</td><td><?php echo $discription;?></td></tr>
			 <tr><td>&nbsp;</td></tr>
            <tr><td>Date</td><td>:</td><td><?php echo $update_date;?></td></tr>
			<tr><td>&nbsp;</td></tr>
            <tr><td>Image</td><td>:</td><td><?php echo  '<img src="'.site_url().''.$img.'" height="75" width="100"/ >';?></td></tr>
		    <tr><td>&nbsp;</td></tr>
		    <tr><td>Content</td><td>:</td>
			<td>
			 <table width="770">

						<tr>
							<td>
								<textarea class="ckeditor" cols="80" id="content" name="content" rows="10"><?php echo $content;?></textarea>
							</td>
						</tr>
			</table>
			</td>
			</tr>
            </table>
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
