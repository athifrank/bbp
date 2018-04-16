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
        	<div class="ptitle">Manage Projects<input type="button"  onclick="window.location.href='<?=site_url();?>featured_projects'"/></div>
               <div class="pcontent">
               <div class="display_msg">
                <?php
				  /*   $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* One new Project added to the list</div>';
					if($a == 'kie')echo'<div class="gre" id="h1">* One Project deleted from the list</div>';
					if($a == 'qne')echo'<div class="gre" id="h1">Server busy Please try again!</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('one');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('del');?></div>
				<div class="gre" id="h3"><?php echo $this->session->flashdata('server');?></div>
      			</div>
                <br />
					<table width="980">
                    	<tr>
                        	<td class="th" width="430">Title</td>
                            <td class="th" width="200">Property type</td>
                            <td class="th" width="200">Location</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
						 <?php
/*                             $run->db_open();
                            $query = mysql_query("SELECT * FROM fp order by pid desc"); */
                            $no = $query->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
                            $re=$query->result_array();
							foreach($re as $row)
                            {
                                $pid=$row['pid'];
								$tit=$row['tit'];	
								$loc=$row['loc'];
								$ptype=$row['ptype'];
                                echo '<tr><td class="td" width="250">'.$tit.'</td>
                                <td class="td" width="250">'.$ptype.'</td>
								<td class="td" width="200">'.$loc.'</td>
                                <td class="td" width="50"><a href="'.site_url().'manage_projects/add_gallery/'.$pid.'"><img src="'.base_url().'assets/images/add.png" height="10" title="Add gallery files" /></a></td>
                                <td class="td" width="50"><a href="'.site_url().'manage_projects/edit_project/'.$pid.'"><img src="'.base_url().'assets/images/edit.png" title="Edit" /></a></td>
                                <td class="td" width="50"><a href="'.site_url().'manage_projects/del_project/'.$pid.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td></tr>';
                            }
                          
                          ?>
   				  </table>
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
