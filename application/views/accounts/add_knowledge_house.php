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
        	<div class="ptitle">Add Knowledge House<input type="button"  onclick="window.location.href='<?=site_url();?>manage_knowledge_house'"/></div>
               <div class="pcontent">
               <div class="display_msg">
                <?php
				 /*    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One User details Removed</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('add');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('fail');?></div>
      			</div>
				<table >
						<tr>
                        	<td class="th" width="250">
							<a href="<?=site_url();?>manage_knowledge_house/add_house">Add Knowledge House</a>
							</td>
							<td width="150">
							&nbsp;
							</td>
							<td>
							<div class="display_msg">
							<?php
							/* $msg=$_REQUEST['msg'];
							echo'<div class="gre" id="h1">*';
							echo $msg;
							echo'</div>'; */
							?>
							<div class="red" id="h3"><?php echo $this->session->flashdata('success');?></div>
							<div class="red" id="h4"><?php echo $this->session->flashdata('fail');?></div>
							</div>
							<?php
							
							?>
							</td>
                        </tr>
				</table>
				<br />
				<form action="<?=site_url();?>manage_knowledge_house/upload_house" method="post" enctype="multipart/form-data">
				<br />
								<label for="file">Upload File:&nbsp;&nbsp;&nbsp;</label>
								<input type="file" name="file" id="file" />
								<br />
								<br />
								<label for="file">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input type="text" name="title" id="title" />
								<br />
								<br />
								<label for="file">Description:&nbsp;&nbsp;&nbsp;</label>
								<input type="text" name="discription" id="discription" />
								<br />
								<br />
				<table width="970">
						<label for="file">Enter Content:</label>
						<tr>
							<td>
								<textarea class="ckeditor" cols="80" id="content" name="content" rows="10"></textarea>
							</td>
						</tr>
				</table>
						
								
							
								<input type="submit" name="submit" value="Submit" />
							

				
				</form>
                  
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

