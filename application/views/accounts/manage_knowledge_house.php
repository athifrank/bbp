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
        	<div class="ptitle">Manage Knowledge House</div>
               <div class="pcontent">
               <div class="display_msg">
                <?php
				/*     $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One Knowledge House Removed</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('one');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
      			</div>
				<table width="180">
						<tr>
                        	<td class="th" width="250">
							<a href="<?=site_url();?>manage_knowledge_house/add_house">Add Knowledge House</a>
							</td>
                        </tr>
				</table>
				<br />
					<table width="980">
                    	<tr>
						<td class="th" width="100">Image</td>
                            <td class="th" width="200">Title</td>
							<td class="th" width="200">Description</td>
                            <td class="th" width="200">Date</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
						 <?php
						 /* 	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 10;//limit in each page
							$startpoint = ($page * $perpage) - $perpage;  
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM knowledge_house order by id desc LIMIT $startpoint,$perpage"); */
							
                            $no = $query->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
							$ro=$query->result_array();
							foreach($ro as $row)
                            {
							    $id=$row['id'];
                                $title=$row['title'];
                                $content=$row['content'];
                                $update_date=$row['update_date'];
								$img=$row['img'];
								$discription=$row['discription'];
                                echo '<tr><td class="td" width="100"><img src='.$img.' height="75" width="100"/></td>
                                      <td class="td" width="200">'.$title.'</td>
									  <td class="td" width="200" title="'.$discription.'">'.substr($discription,0, 30).'</td>
									  <td class="td" width="200">'.$update_date.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_knowledge_house/view_knowledge/'.$id.'"><img src="'.base_url().'assets/images/view.png" title="View Details" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_knowledge_house/edit_knowledge/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'manage_knowledge_house/del_knowledge/'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td></tr>';
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
