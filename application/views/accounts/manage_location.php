<?php 
/*     require_once('action/jcode.php'); 
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
    	<div class="ptitle">Manage Location</div>
    	<div class="pcontent">
                <div class="display_msg">
                <?php
				 /*    $run->error();
					$a=$_REQUEST['a'];
					if($a == 'kii')echo'<div class="red" id="h1">* All fields are required</div>';
					if($a == '1ji')echo'<div class="gre" id="h1">* One location Removed</div>';
					if($a == 'qne')echo'<div class="red" id="h1">* Server busy please try later</div>';
					if($a == 'ki9')echo'<div class="gre" id="h1">* One new location added</div>'; */
				?>
				<div class="red" id="h1"><?php echo $this->session->flashdata('all');?></div>
				<div class="red" id="h2"><?php echo $this->session->flashdata('one');?></div>
				<div class="red" id="h3"><?php echo $this->session->flashdata('server');?></div>
				<div class="red" id="h4"><?php echo $this->session->flashdata('new');?></div>
				
                </div>
                <form action="<?=site_url();?>manage_location/add_loc" method="post">
			    <table width="980" height="45">
        		<tr>
                  <td width="310"><input type="text" style="width:300px;" name="name"
            		value="Add new Location" 
					onBlur="if(this.value=='')this.value='Add new Location'" 
					onfocus="if(this.value=='Add new Location')this.value=''" /></td>

                  <td width="500"><input type="submit"  value="Add" /> <input type="reset"  value="Reset" /></td>
                  </tr>
             </table>
          </form>
          
          				<table width="980">
                    	<tr>
                            <td class="th" width="205">Location</td>
                            <td class="th" width="30">Delete</td>
                            <td width="10"></td>
                            
                            <td class="th" width="205">Location</td>
                            <td class="th" width="30">Delete</td>
                            <td width="10"></td>

                            <td class="th" width="205">Location</td>
                            <td class="th" width="30">Delete</td>
                            <td width="10"></td>

                            <td class="th" width="205">Location</td>
                            <td class="th" width="30">Delete</td>
                            <td width="10"></td>
                        </tr>
                        <?php
						/* 	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
							$page = ($page == 0 ? 1 : $page);
							$perpage = 80;//limit in each page
							$startpoint = ($page * $perpage) - $perpage; 
                            $run->db_open();
                            $query = mysql_query("SELECT * FROM location_list order by name asc LIMIT $startpoint,$perpage"); */
                            $no = $result->num_rows();
                            if(empty ($no))
                            {
                                echo '<tr><td class="td" colspan="6">No records found</td>';
                            }
							$s =1;
                            $re=$result->result_array();
							foreach($re as $row)
                            {
                                $name=$row['name'];	
								$id=$row['id'];	
								
								if($s == 1) {
                                  echo '<tr>
									  	<td class="td" width="205">'.$name.'</td>  
                                      	<td class="td" width="30"><a href="'.site_url().'manage_location/del_loc/'.$id.'">
									  	<img src="'.base_url().'assets/images/delete.png" title="Delete this location"/></a></td>
									  	<td width="10"></td>';
										}
								elseif($s == 2) {
								   echo'<td class="td" width="205">'.$name.'</td>  
                                      	<td class="td" width="30"><a href="'.site_url().'manage_location/del_loc/'.$id.'">
									  	<img src="'.base_url().'assets/images/delete.png" title="Delete this location"/></a></td>
									  	<td width="10"></td>';
								}
								elseif($s == 3)		
								   echo'<td class="td" width="205">'.$name.'</td>  
                                      	<td class="td" width="30"><a href="'.site_url().'manage_location/del_loc/'.$id.'">
									  	<img src="'.base_url().'assets/images/delete.png" title="Delete this location"/></a></td>
									  	<td width="10"></td>';
								elseif($s == 4)	{	
								   echo'<td class="td" width="205">'.$name.'</td>  
                                      	<td class="td" width="30"><a href="'.site_url().'manage_location/del_loc/'.$id.'">
									  	<img src="'.base_url().'assets/images/delete.png" title="Delete this location"/></a></td>
									  	<td width="10"></td>
									    </tr>';
										$s=0;
								}
										$s++;
										
                            }
                          
                          ?>
                    </table>
                    <div id="pagdiv" style="    margin-left: 360px;"><?php echo $pagination; ?>	</div>		
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
