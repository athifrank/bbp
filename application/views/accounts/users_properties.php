<?php 
/*       require_once('action/jcode.php');
	  $run->error();
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
    	<div class="ptitle">User Properties</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
			/* 	    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One User Property Removed</div>';
					if($a == 'kie')echo'<div class="gre" id="h1">* One New Property added</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('del');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
                </div>
				<form method = "post" action = "<?=site_url();?>del_property_multi">
					<table width="980">
                    	<tr>
                        	<td class="th" width="100">Property Id</td>
                            <td class="th" width="300">Project Title</td>
                            <td class="th" width="200">Location</td>
                            <td class="th" width="230">Created By</td>
                            <td class="th" width="150" colspan="2">Manage</td>
							<td class="th" width="100"><input type ="submit" value ="Delete"></td>
                        </tr>
                        <?php 
						/* 	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 50;//limit in each page
							$startpoint = ($page * $perpage) - $perpage;
                            $run->db_open(); */
							
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="7">No records found</td>';
                            }
                             foreach($no as $row)
                            {
                                $id=$row['id'];
								$title=$row['tit'];
								$loc=$row['loc'];
                                $date=$row['name'];
                                echo '<tr><td class="td" width="100">'.$id.'</td>
                                      <td class="td" width="300" title="'.$title.'">'.substr($title, 0, 40-3).'</td>
                                      <td class="td" width="200">'.$loc.'</td>
									  <td class="td" width="230">'.$date.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'view_property/admin/'.$id.'"><img src="'.base_url().'assets/images/view.png" title="View Details" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'edit_property/admin_edit/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'delete_property_admin/index/'.$id.'"><input type="checkbox" name ="del[]" value = "'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td></tr>';
                            }
                           
                          ?>						  
                    </table>
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
