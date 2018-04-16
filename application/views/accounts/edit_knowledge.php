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
        	<div class="ptitle">Edit Details <input type="button"  onclick="window.location.href='<?=site_url();?>manage_knowledge_house'"/></div>
            <div class="pcontent">
               <div class="display_msg">
                <?php
				   /*  $run->error();
					$a=$_REQUEST['a'];
					if($a == '1i0')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* New details Updated</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('all');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('server');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('new');?></div>
                </div>
				  <?php 
                   /*  $run->db_open();
                    $id=$_REQUEST['b'];
                    $query = mysql_query("SELECT * FROM knowledge_house where id=$id");
                    $run->db_close();
                    $row = mysql_fetch_array($query); */
					foreach($ro as $row){
					$id=$row['id'];
                    $title=$row['title'];
                    $content=$row['content'];
                    $update_date=$row['update_date'];
                    $img=$row['img'];
					$discription=$row['discription'];
                    ?>
		   <div style="margin:0px auto; width:950px;">
        	<form action="<?=site_url();?>manage_knowledge_house/edit_action" method="post">
        
            <table width="950" height="400">
            <tr><td width="130">Title</td><td width="10">:</td><td width="260"><input type="text" name="title" value="<?php echo $title;?>" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Description</td><td>:</td><td><input type="text" name="discription" value="<?php echo $discription;?>" /></td></tr>
			<tr><td>&nbsp;</td></tr>
            <tr><td>Date</td><td>:</td><td><input type="text" name="update_date" value="<?php echo $update_date;?>"  /></td></tr>
			<tr><td>&nbsp;</td></tr>
            <tr><td>img</td><td>:</td><td><?php echo  '<img src="'.site_url().''.$img.'" height="75" width="100"/ >';?></td></tr>
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
            <tr><td class="tdname" height="40"></td><td width="10"><input type="hidden" value="<?php echo $id ?>" name="id"  />
            </td><td><input type="submit"  value="Update" /> </td></tr>
            </table>
			
            </form>
        </div>	
					<?php } ?>
   	  </div>
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
