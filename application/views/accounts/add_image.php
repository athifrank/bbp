<?php 

	    defined('BASEPATH') OR exit('No direct script access allowed');
	   	if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) 
		{
			$this->load->view('accounts/page_expired');
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
		<?php $this->load->view('accounts/pages/hide_menu'); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
    	<div class="ptitle">Upload image</div>
    	<div class="pcontent">
        <div class="display_msg">
               <?php
				/* $a=$_REQUEST['a']; 
		  		if($a == 'i10') echo '<div id="h1" class="red">Input file not selected</div>';
				if($a == 'i11') echo '<div id="h1" class="red">The file you attempted to upload is not allowed</div>';
				if($a == 's11') echo '<div id="h1" class="red">The file you attempted to upload is too large</div>';
				if($a == 'd11') echo '<div id="h1" class="red">You cannot upload to the specified directory, please CHMOD it to 777.</div>';
				if($a == 'e12') echo '<div id="h1" class="red">There was an error during the file upload. Please try again!</div>'; */

		
			?>
			<div id="h1" class="green" style="color:green;"><?php echo $this->session->flashdata('success');?></div>
			<div id="h1" class="red"><?php echo $this->session->flashdata('error');?></div>
			<div id="h1" class="red"><?php echo $this->session->flashdata('large');?></div>
			<div id="h1" class="red"><?php echo $this->session->flashdata('nof');?></div>
			<div id="h1" class="red"><?php echo $this->session->flashdata('chmod');?></div>
          </div>
			    <div style="margin:0 auto; width:400px;">
                <table height="150" width="400">
                	<tr>
                    	<td width="100" height="100">Upload Image</td>
                        <td width="300">
                        <form action="<?=site_url();?>user_upload_file" method="post" enctype="multipart/form-data">
							<input type="file" name="userfile" id="file" required>
                            <input type="hidden" name="page" value="1" >
							<input type = "hidden" name = "tit" value = "<?php foreach($row as $data) $tit=$data['tit'];  echo $tit; ?>" >
                            <input type="hidden" name="id" value="<?php foreach($row as $data) $id=$data['id'];  echo $id; ?>" >
                            <input type="submit" value="upload">
                         </form>
                       </td>
                   </tr>
                   <tr><td colspan="2">Note: Only .jpg files are allowed to upload (Max 10Mb)</td></tr>
                   <tr><td colspan="2"></td></tr>
                   
                   <tr><td colspan="2" height="50">To skip this step click finish button</td></tr>
                   <tr>
                   <td><form action="<?=site_url();?>skip_upload/index/<?php foreach($row as $data) $id=$data['id'];  echo $id;?>" method="post"><input type="submit" value="Finish"/></form></td></tr>
                  </table>
                  
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
