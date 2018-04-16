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
<style>
.thumb{width:104px; float:left; border:#900 2px solid; margin:15px; background-color:#F4F4F4;}
.thumb a1{  }
</style>
</head>
<body>
<!----- Header_2 begins ----->
<div id="header_p" class="wrapper">
    <div class="logo"><img src="<?=base_url();?>assets/images/logo.png" /></div>
    <div class="menu">
		<?php $this->load->view('accounts/pages/admin_menu'); ?>
    </div>
</div>
<!----- Header_2 ends ----->

<div id="content" class="wrapper">
  <div id="parea">
    	<div class="ptitle">Manage Thumbnails</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				  /*   $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == 'ki1')echo'<div class="red" id="h1">* Invalid property id provided</div>';
					if($a == 'ki2')echo'<div class="red" id="h1">* Property id already exits</div>';
					if($a == '1ji')echo'<div class="gre" id="h1">* One thumbnail removed from the list</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* One thumbnail added to the list</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('one');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
				<div class="gre" id="h3"><?php echo $this->session->flashdata('all');?></div>
				<div class="gre" id="h4"><?php echo $this->session->flashdata('invalid');?></div>
				<div class="gre" id="h5"><?php echo $this->session->flashdata('ex');?></div>
				<div class="gre" id="h5"><?php echo $this->session->flashdata('add');?></div>


                </div>
                <form action="<?=site_url();?>manage_thumbnails/add_thumbnails" method="post">
			    <table width="980" height="45">
        		<tr>
                  <td width="361"><input type="text" style="width:300px;" name="pid"
            		value="Enter Property Id" 
					onBlur="if(this.value=='')this.value='Enter Property Id'" 
					onfocus="if(this.value=='Enter Property Id')this.value=''" /></td>

                  <td width="162"><input type="submit"  value="Add" /> <input type="reset"  value="Reset" /></td>
                  <td width="441">For best view use minimum of 9 thumbnails in a cycle</td>
                  </tr>
             </table>
          </form>
          
                        <?php

                            $no = $query->num_rows();
                            if(empty ($no))
                            {
                                echo '<div class="td">No records found</div>';
                            }
							
                            $ro=$query->result_array();
							foreach($ro as $row)
                            {
                                $fname=$row['fname'];	
								$id=$row['id'];	
								$pid=$row['pid'];
								
								echo '<div class="thumb">
						   	<table>
							<tr><td><a href="'.site_url().'manage_thumbnails/del_thumbs/'.$id.'"><img src="'.base_url().'thumbs/'.$fname.'" title="click the image to remove from the list"/></a></td>
							<tr><td style="text-align:center;">Pid ('.$pid.')</td></tr>
							</table>
						   </div>';		
                            }
                          ?>
   	  </div>
   </div>
   <div class="clear"></div>
</div>
<!----- Content ends -----> 

<!----- Footer begins ----->
<div id="footer">
	<?php  $this->load->view("pages/footer");?>
</div> 

</body>
</html>
