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
<style>
.icon{
	float:right;
	margin-left:15px;
	font-size:14px;
	color:#036;
}
.icon img {
	margin-right:3px;
}
.icon a{
	text-decoration:none;
	color:inherit;
}
</style>
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
    	<div class="ptitle">Featured Projects</div>
    	<div class="pcontent">
                <div class="display_msg">
                    <div class="icon"><a href="<?=site_url();?>manage_projects"><img src="<?=site_url();?>assets/images/manage.png" width="12" height="12"/>Manage</a></div>
                    <div class="icon"><a href="<?=site_url();?>featured_projects/add_projects"><img src="<?=site_url();?>assets/images/add.png" width="10" height="10"/>Add</a></div>
                </div>
                
                <div class="display_msg">
                <?php
				  /*   $run->error();
					$a=$_REQUEST['a'];
					$b=$_REQUEST['b'];
					$c=$_REQUEST['c'];
					if($a == 'kii') echo'<div class="red" id="h1">* Select both position and project to update</div>';
					if($a == 'qne') echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9') echo'<div class="gre" id="h1"></div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('select');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('server');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('pos');?></div>
                </div>
                
          		<div style="width:750px; height:380px; margin:0 auto;">
                <form action="<?=site_url();?>featured_projects/update_position" method="pos">
			    <table width="750" height="45" align="center">
        		<tr>
                   <td width="100"><select name="pos" class="tdbox">
                   	<option value="0">- Select -</option>
                   <?php
				   			/* $run->db_open();
                            $query = mysql_query("SELECT pos from fp order by pos;");
							$run->db_close();
							while($row = mysql_fetch_array($query)) */
							foreach($ro as $row)
							{
								$pos=$row['pos'];
                   				echo '<option value="'.$pos.'">Position-'.$pos.'</option>';
							}
					?>
                   </select></td>

                  <td width="500"><input type="submit"  value="Update" /></td>
                  </tr>
             </table>
         	 
          		<?php
				/* //$query = mysql_query("SELECT f.*, i.*, p.*  FROM ((fp f LEFT JOIN image i ON f.PID = i.PID)LEFT JOIN properties p ON i.PID = p.ID)");
                            $run->db_open();
                     		$query = mysql_query("SELECT * FROM fp order by pos"); */
                            $no =$query->num_rows();
                            if(empty ($no))
                            {
                                echo '<div class="td">No records found</div>';
                            }
							
                            $re=$query->result_array();
							foreach($re as $row)
                            {
                                $pid=$row['pid'];
								$tit=$row['tit'];	
								$loc=$row['loc'];
								$ptype=$row['ptype'];
								$banner=$row['banner'];
								$thumbs=$row['thumbs'];
								$text=$row['text'];
								if($ptype == 'Commercial Property') $ptype = 'Commercial';

								$tit=substr($row['tit'], 0, 15); $tit1=strlen($tit);
								if($tit1 == 17) $tit1='...'; else $tit1='';
								
								$loc=substr($row['loc'], 0, 15); $loc1=strlen($loc);
								if($loc1 == 17) $loc1='...'; else $loc1='';	
								
								echo '<div class="box">
									  <img src="'.base_url().'thumbs/'.$thumbs.'"/>
									  <div>'.$tit; echo $tit1.'<br />'.$ptype.'<br />'.$loc; echo $loc1.'</div>
									  <div><input type="radio" name="pid" value="'.$pid.'" /><a href="'.site_url().'project_details/index/'.$pid.'" target="_blank">more..</a></div>
									  </div>';
                            }
                          ?>
                          </form>  
          		</div> 
                      
                  
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
