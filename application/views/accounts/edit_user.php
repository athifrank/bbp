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
        	<div class="ptitle">Edit Details <input type="button"  onclick="window.location.href='<?=site_url();?>manage_users'"/></div>
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
				<div class="red" id="h2"><?php echo $this->session->flashdata('new');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('server');?></div>

                </div>
				  <?php 

                    foreach($ro as $row){
					$id=$row['id'];
                    $name=$row['name'];
                    $email=$row['eid'];
                    $add=$row['add'];
                    $city=$row['city'];
                    $country=$row['coun'];
                    $zipcode=$row['zip'];
                    $mobile=$row['mobi'];
                    $cname=$row['cname'];
                    $website=$row['url'];
					$date=$row['date'];
                    ?>
		   <div style="margin:0px auto; width:350px;">
        	<form action="<?=site_url();?>manage_users/edit_action" method="post">
        
            <table width="350" height="400">
            <tr><td width="130">Name</td><td width="10">:</td><td width="260"><input type="text" name="name" value="<?php echo $name;?>" /></td></tr>
            <tr><td>E-mail Id</td><td>:</td><td><input type="text" name="eid" value="<?php echo $email;?>" /></td></tr>
            <tr><td>Address</td><td>:</td><td><input type="text" name="add" value="<?php echo $add;?>"  /></td></tr>
            <tr><td>City</td><td>:</td><td><input type="text" name="city" value="<?php echo $city;?>"  /></td></tr>
            <tr><td>Zipcode</td><td>:</td><td><input type="text" name="zip" value="<?php echo $zipcode;?>"  /></td></tr>
            <tr><td>Country</td><td>:</td><td><input type="text" name="coun" value="<?php echo $country;?>"  /></td></tr>
            <tr><td>Mobile</td><td>:</td><td><input type="text" name="mobi" value="<?php echo $mobile;?>"  /></td></tr>
            <tr><td>Company Name</td><td>:</td><td><input type="text" name="cname" value="<?php echo $cname;?>"  /></td></tr>
            <tr><td>Website</td><td>:</td><td><input type="text" name="url" value="<?php echo $website;?>"  /></td></tr>
            <tr><td>Member since</td><td>:</td><td><?php echo $date;?></td></tr>
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
