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
		<?php $this->load->view("accounts/pages/user_menu"); ?>
    </div>
</div>
<!----- Header_2 ends ----->
<div id="content" class="wrapper">
  <div id="parea">
    	<div class="ptitle">Manage Properties</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				  /*   $run->error();
					$a=$_REQUEST['a'];
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'kii')echo'<div class="gre" id="h1">* One Property deleted</div>';
					if($a == 'kie')echo'<div class="gre" id="h1">* One New Property added</div>'; */
				?>
				<div class="gre" id="h1"><?php echo $this->session->flashdata('new');?></div>
				<div class="gre" id="h2"><?php echo $this->session->flashdata('server');?></div>
				<div class="gre" id="h3"><?php echo $this->session->flashdata('del');?></div>
                </div>
					<table width="980">
                    	<tr>
                        	<td class="th" width="100">Property Id</td>
                            <td class="th" width="300">Project Title</td>
                            <td class="th" width="280">Location</td>
                            <td class="th" width="150">Created date</td>
                            <td class="th" width="150" colspan="3">Manage</td>
                        </tr>
                        <?php 
						 	/* $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 50;//limit in each page
							$startpoint = ($page * $perpage) - $perpage;
                            $run->db_open(); */
                          /*   $query = mysql_query("SELECT * FROM properties WHERE uid=$uid order by id desc LIMIT $startpoint,$perpage");							
                            $no = mysql_num_rows($query); */
							
							
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="7">No records found</td>';
                            }
                            foreach($no as $row)
                            {
                                $id=$row['id'];
								$title=$row['tit'];
								$loc=$row['loc'];
                                $date=$row['date'];
                                $id=$row['id'];
                                echo '<tr><td class="td" width="100">'.$id.'</td>
                                      <td class="td" width="300" title="'.$title.'">'.substr($title, 0, 40-3).'</td>
                                      <td class="td" width="280">'.$loc.'</td>
									  <td class="td" width="150">'.$date.'</td>
                                      <td class="td" width="50"><a href="'.site_url().'view_property/index/'.$id.'"><img src="'.base_url().'assets/images/view.png" title="View Details" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'edit_property/index/'.$id.'"><img src="'.base_url().'assets/images/edit.png" title="Edit" /></a></td>
                                      <td class="td" width="50"><a href="'.site_url().'delete_property/index/'.$id.'"><img src="'.base_url().'assets/images/delete.png" title="Delete"/></a></td></tr>';
                            } 
                          
                          ?>
                    </table>
                   <?php
			/* 	   echo $check=$run->pagination("properties",$perpage,"manage_properties.php?","Where uid=$uid"); $run->db_close(); 
				         if(!$check) echo'<br><br><br><br>'; */
					?>
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
