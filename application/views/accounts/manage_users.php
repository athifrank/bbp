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
        	<div class="ptitle">Manage Users</div>
               <div class="pcontent">
               <div class="display_msg">
                <?php
				 /*    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One User details Removed</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('one');?></div>
				<div class="red" id="h1"><?php echo $this->session->flashdata('server');?></div>
      			</div>
					<table width="980">
                    	<tr>
                        	<td class="th" width="250">Name</td>
                            <td class="th" width="250">E-mail</td>
                            <td class="th" width="130">Mobile</td>
                            <td class="th" width="200">city</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
						 <?php
				/* 		 	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 15;//limit in each page
							$startpoint = ($page * $perpage) - $perpage;  
                            $run->db_open(); */
                            $no = $query->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
                                $re=$query->result_array();
								foreach($re as $row)
                             {
                                $name=$row['name'];
                                $email=$row['eid'];
                                $mobile=$row['mobi'];
								$city=$row['city'];
                                $id=$row['id'];
                                echo '<tr><td class="td" width="250">'.$name.'</td>
                                      <td class="td" width="250">'.$email.'</td>
                                      <td class="td" width="130">'.$mobile.'</td>
									  <td class="td" width="200">'.$city.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_users/view_user/'.$id.'"><img src="'.base_url().'assets/images/view.png" title="View Details" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_users/edit_user/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_users/del_user/'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td></tr>';
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
